# Daftarkan tugas terjadwal Windows yang menjalankan scripts\serve.ps1 setiap login.
# Pakai: powershell -ExecutionPolicy Bypass -File scripts\install-autostart.ps1
# Hapus : Unregister-ScheduledTask -TaskName GendingGoldenPark -Confirm:$false
$script = Join-Path $PSScriptRoot 'serve.ps1'
$action = New-ScheduledTaskAction -Execute 'powershell.exe' `
    -Argument "-NoProfile -ExecutionPolicy Bypass -WindowStyle Hidden -File `"$script`""
$trigger = New-ScheduledTaskTrigger -AtLogOn -User $env:USERNAME
$settings = New-ScheduledTaskSettingsSet -AllowStartIfOnBatteries -DontStopIfGoingOnBatteries `
    -StartWhenAvailable -RestartCount 999 -RestartInterval (New-TimeSpan -Minutes 1) `
    -ExecutionTimeLimit ([TimeSpan]::Zero) -MultipleInstances IgnoreNew
Register-ScheduledTask -TaskName 'GendingGoldenPark' -Action $action -Trigger $trigger -Settings $settings `
    -Description 'Menjalankan situs Gending Golden Park dan Cloudflare tunnel' -Force | Out-Null
Write-Host 'Tugas terjadwal "GendingGoldenPark" terdaftar (jalan setiap login).'
