<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ini Wm</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="m1">
        <h1>Oil Market</h1>
        <form action="index.php" method="post">
            <label for="jumlah_liter">Liter :</label>
            <input type="number" id="jumlah_liter" name="jumlah_liter" min="1" required>
            <br>
            <label for="tipe_bahan_bakar">Fuell  :</label>
            <select id="tipe_bahan_bakar" name="tipe_bahan_bakar" required>
                <option value="shell_super">Shell Super</option>
                <option value="shell_v_power">Shell V-Power</option>
                <option value="shell_v_power_diesel">Shell V-Power Diesel</option>
                <option value="shell_v_power_nitro">Shell V-Power Nitro</option>
            </select>
            <br><br>
            <button class="a satu"type="submit">Beli</button>
            
        </form>
        <div class="m2">
        <?php
        if (isset($_POST['jumlah_liter']) && isset($_POST['tipe_bahan_bakar'])) {
            $jumlah_liter = $_POST['jumlah_liter'];
            $tipe_bahan_bakar = $_POST['tipe_bahan_bakar'];
            class BahanBakar {
                protected $harga;
            
                public function __construct($jumlah_liter) {
                    $this->jumlah_liter = $jumlah_liter;
                }
            
                public function hitungTotal() {
                    $total = $this->jumlah_liter * $this->harga;
                    $ppn = 10 / 100 * $total;
            
                    echo "<p>Total yang harus anda bayar Rp. <strong>" . number_format($total, 0, ',', '.') . "</strong></p>";
                    echo "<p>PPN 10%: Rp. " . number_format($ppn, 0, ',', '.') . "</p>";
                }
            }
            
            class ShellSuper extends BahanBakar {
                protected $harga = 15420;
            }
            
            class ShellVPower extends BahanBakar {
                protected $harga = 16130;
            }
            
            class ShellVPowerDiesel extends BahanBakar {
                protected $harga = 18310;
            }
            
            class ShellVPowerNitro extends BahanBakar {
                protected $harga = 16510;
            }
            
            if (isset($_POST['jumlah_liter']) && isset($_POST['tipe_bahan_bakar'])) {
                $jumlah_liter = $_POST['jumlah_liter'];
                $tipe_bahan_bakar = $_POST['tipe_bahan_bakar'];
            
                switch ($tipe_bahan_bakar) {
                    case 'shell_super':
                        $transaksi = new ShellSuper($jumlah_liter);
                        break;
                    case 'shell_v_power':
                        $transaksi = new ShellVPower($jumlah_liter);
                        break;
                    case 'shell_v_power_diesel':
                        $transaksi = new ShellVPowerDiesel($jumlah_liter);
                        break;
                    case 'shell_v_power_nitro':
                        $transaksi = new ShellVPowerNitro($jumlah_liter);
                        break;
                }
            
                echo "<h2>Bukti Transaksi</h2>";
                echo "<p>Anda membeli bahan bakar minyak tipe <strong>" . ucwords($tipe_bahan_bakar) . "</strong></p>";
                echo "<p>Dengan jumlah: <strong>" . $jumlah_liter . " Liter</strong></p>";
                $transaksi->hitungTotal();
            }
            
        }
        ?>
        
        </div>
    </div>
</body>
</html>
