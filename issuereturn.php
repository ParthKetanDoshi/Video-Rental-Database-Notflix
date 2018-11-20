<!DOCTYPE html>
<html>
<head>
	<title>Issue-Return</title>
	<style>
		body
        {
            background-color: #1E1D1D;
        }
        form
        {
        	font-family: "Bebas Neue";
            color: #E50914;
            font-size: 28px;
        }
        table
        {
            width: 100%;
            border-collapse: collapse;
        }
        th
        {
            font-family: "Bebas Neue";
            color: #E50914;
            font-size: 35px;
            background-color: #000000;
        }
        td
        {
            font-family: "Bebas Neue";
            width: 15%;
            color: #E50914;
            font-size: 28px;
            text-align: center;
        }
        .notch
        {
            position: fixed;
            width: 100%;
			bottom: 0;
            left: 0;
        }
        .notflix
        {
            position: fixed;
            width: 100%;
            bottom: 0px;
        }
        .btc
        {
            position: fixed;
            height: 35px;
            bottom: 40px;
            left: 150px;
        }
        .btv
        {
            position: fixed;
            height: 35px;
            bottom: 40px;
            right: 150px;
        }
	</style>
</head>
<body>
	
	<div class="section"> 
        <a href="issuereturn.php"><img src="notch.png" class="notch" /></a>
        <a href="index.html"><img src="notflix.png" class="notflix" /></a>
        <a href="cust.html"><img src="cust.png" class="btc" /></a>
        <a href="vid.html"><img src="vid.png" class="btv" /></a>
    </div>
    <form action="issret.php" method="post">
    	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		Customer ID: <input type="text" name="cid" size="2"> 
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		Video ID: <input type="text" name="vid" size="2"> 
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		Number of Videos: <input type="Number" name="numvids" min="1" max="3"><br>
		
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		Issue Date: <input type="Date" name="issuedate" inputmode="Date"> 
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
		Return Date: <input type="Date" name="returndate" inputmode="Date"><br>
		
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		Condition(0:Good to 10:Bad): <input type="Number" name="cond" min="0" max="10"> 
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		Fine(Condition x 5 + Number of Elapsed Days x 2): <input type="Number" name="fine" min="0" max="999"><br>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		<input type="Submit" name="Submit" style="background-color: #1E1D1D;font-family: Bebas Neue;font-size: 40px;border-color: #1E1D1D; color: #E50914;">
	</form>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Video ID</th>
            <th>Number of Videos</th>
            <th>Issue Date</th>
            <th>Return Date</th>
            <th>Condition</th>
            <th>Fine</th>
        </tr>
    </table>
    <div style="overflow:auto;overflow-x: hidden;height: 250px;width: 100%;">
    <table align="right">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "notflix";

                $conn = mysqli_connect($servername, $username, $password, $database);
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "select cid, vid, numvids, issuedate, returndate, cond, fine from issuereturn";
                $result = $conn -> query($sql);

                if ($result -> num_rows > 0) 
                {
                    while ($row = $result -> fetch_assoc()) 
                    {
                        echo "<tr><td>".$row["cid"]."</td><td>".$row["vid"]."</td><td>".$row["numvids"]."</td><td>".$row["issuedate"]."</td><td>".$row["returndate"]."</td><td>".$row["cond"]."</td><td>".$row["fine"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else
                {
                    echo '<span style="color:#E50914;"> No Data in Database </span>';
                }

                $conn -> close();
            ?>
    </table>
    </div>
</body>
</html>
