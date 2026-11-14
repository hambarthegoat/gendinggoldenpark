# Jalankan situs + Cloudflare named tunnel (domain di ~/.cloudflared/config.yml),
# dan nyalakan ulang otomatis kalau salah satunya mati. Dipakai oleh tugas terjadwal
# "GendingGoldenPark" (lihat scripts\install-autostart.ps1).
# Pakai manual: powershell -ExecutionPolicy Bypass -File scripts\serve.ps1 [-Port 8000]
param([int]$Port = 8000)

$root = Split-Path -Parent $PSScriptRoot
Set-Location $root
$env:PHP_CLI_SERVER_WORKERS = '4'

function Test-AppUp { [bool](Get-NetTCPConnection -LocalPort $Port -State Listen -ErrorAction SilentlyContinue) }
function Test-TunnelUp {
    [bool](Get-CimInstance Win32_Process -Filter "Name='cloudflared.exe'" |
        Where-Object { $_.CommandLine -match 'tunnel' -and $_.CommandLine -match 'run' })
}

while ($true) {
    if (-not (Test-AppUp)) {
        Start-Process php -ArgumentList 'artisan', 'serve', '--host=127.0.0.1', "--port=$Port" -WindowStyle Hidden
        Start-Sleep 3
    }
    if (-not (Test-TunnelUp)) {
        Start-Process cloudflared -ArgumentList 'tunnel', '--no-autoupdate', 'run' -WindowStyle Hidden
    }
    Start-Sleep 10
}
