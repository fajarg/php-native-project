<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grafik Gunung Api</title>

		<style type="text/css">
            

                body{
                        font-family: arial;
                }

                body{
                        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("d.jpg");
                        height: 100vh;
                        background-color: white;
                        background-size: cover;
                        background-position: center bottom;
                }
                        ul{
                            list-style-type: none;
                            float: right;
                            margin-top: 0px;
                        }

                        ul li{
                            display:inline-block;
                        }

                        ul li a{
                            text-decoration: none;
                            color: white;
                            padding:5px 30px;
                            border: 1px solid transparent;
                            transition: 0.6s;
                        }
                        ul li a:hover{
                            background-color: white;
                            color: black;
                        }
                        ul li.active a{
                            background-color: white;
                            color: black;
                        }
                        .main{
                            max-width: 1200px;
                            
                            text-decoration: none;
                            color: white;
                            position:absolute;
                            left:1000px;
                            top:10px;
                        }
		</style>
	</head>
<body>
        <div class="main">
                        <ul>
                                <li><a href="../../utama.php" class="active"><p style="font-family: century gothic">Data Gunung</a></li>
                                                 
                        </ul>   
        </div>
<script src="../code/highcharts.js"></script>
<script src="../code/modules/exporting.js"></script>
<script src="../code/modules/export-data.js"></script>

<div id="container" style="min-width: 410px; height: 400px; max-width: 600px; margin: 150px auto"></div>
<?php
$id=mysqli_connect("127.0.0.1","root","","db_gunung");
$hasil=mysqli_query($id,"select nama, tinggi from tb_g");
$data="";
while($row=mysqli_fetch_array($hasil))
{
	$data=$data. "{ name: '"  . $row['nama'] . "', y:" .  $row['tinggi'] ." },";
}

?>

<script type="text/javascript">
	Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: true,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Grafik 3 Gunung Api Tertinggi'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: 
		[
		<?php
			echo $data;
		?>
		]
    }]
});
</script>
</body>
</html>
