# Jalankan situs lokal + Cloudflare quick tunnel, otomatis restart kalau mati.
# Pakai: powershell -ExecutionPolicy Bypass -File scripts\tunnel.ps1 [-Port 8000]
# Berhenti dengan Ctrl+C.
param([int]$Port = 8000)

$ErrorActionPreference = 'Stop'
$root = Split-Path -Parent $PSScriptRoot
Set-Location $root

if (-not (Get-Command cloudflared -ErrorAction SilentlyContinue)) {
    throw 'cloudflared tidak ditemukan. Install: winget install Cloudflare.cloudflared'
}
if (-not (Test-Path .env)) { throw '.env belum ada. Jalankan: composer run setup' }
if (-not (Test-Path public\storage)) { php artisan storage:link | Out-Null }

$log = Join-Path $env:TEMP 'gdp-cloudflared.log'
$env:PHP_CLI_SERVER_WORKERS = '4'   # beberapa worker supaya upload tidak memblokir request lain

function Start-App {
    Start-Process php -ArgumentList 'artisan', 'serve', '--host=127.0.0.1', "--port=$Port" -WindowStyle Hidden -PassThru
}

function Start-Tunnel {
    Remove-Item $log -ErrorAction SilentlyContinue
    $p = Start-Process cloudflared -ArgumentList 'tunnel', '--url', "http://127.0.0.1:$Port", '--no-autoupdate', '--logfile', $log -WindowStyle Hidden -PassThru
    for ($i = 0; $i -lt 30; $i++) {
        Start-Sleep 1
        if ($p.HasExited) { break }
        $m = if (Test-Path $log) { Select-String -Path $log -Pattern 'https://[a-z0-9-]+\.trycloudflare\.com' | Select-Object -First 1 }
        if ($m) { Write-Host "`nURL publik: $($m.Matches[0].Value)`n" -ForegroundColor Green; break }
    }
    $p
}

$app = $null
$tunnel = $null
try {
    $app = Start-App
    $tunnel = Start-Tunnel
    Write-Host 'Berjalan. Tekan Ctrl+C untuk berhenti.'
    while ($true) {
        Start-Sleep 5
        if ($app.HasExited) {
            Write-Host 'Server mati, menjalankan ulang...' -ForegroundColor Yellow
            $app = Start-App
        }
        if ($tunnel.HasExited) {
            Write-Host 'Tunnel mati, menjalankan ulang (URL akan berubah)...' -ForegroundColor Yellow
            $tunnel = Start-Tunnel
        }
    }
}
finally {
    foreach ($p in $tunnel, $app) { if ($p -and -not $p.HasExited) { Stop-Process -Id $p.Id -Force } }
    Get-CimInstance Win32_Process -Filter "Name='php.exe'" | Where-Object { $_.CommandLine -match "serve.*--port=$Port" } | ForEach-Object { Stop-Process -Id $_.ProcessId -Force }
}
