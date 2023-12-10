<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .th-title {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<?php

date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ theo GMT+7
$tuancuanam = date('W');

// Lấy ngày hiện tại
$currentDate = new DateTime();
$namhientai = date('Y');

// Lấy ngày đầu tiên trong tuần
$ngaydautuan = clone $currentDate;
$ngaydautuan->modify('this week'); // 'this week' để lấy ngày đầu tiên của tuần hiện tại
// Lấy ngày cuối cùng trong tuần
$ngaycuoituan = clone $ngaydautuan;
$ngaycuoituan->modify('Sunday'); // 'Sunday' để lấy ngày cuối cùng của tuần
// Hiển thị kết quả

?>
<?php
include "config.php";

// Lấy ngày hiện tại
$currentDate = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));

// Lấy ngày đầu tuần (thứ 2)
$startOfWeek = clone $currentDate;
$startOfWeek->modify('this week')->modify('Monday');

// Tạo mảng chứa thông tin về các ngày trong tuần
$daysOfWeek = array();
for ($i = 0; $i < 7; $i++) {
    $day = clone $startOfWeek;
    $day->modify("+$i day");

    // Lấy thông tin ngày trong tháng và thứ
    $dayOfWeek = $day->format('N');

    $daysOfWeek[] = array(
        'date' => $day->format('d/m')
    );
}
$thu2 = $daysOfWeek[0]['date'];
$thu3 = $daysOfWeek[1]['date'];
$thu4 = $daysOfWeek[2]['date'];
$thu5 = $daysOfWeek[3]['date'];
$thu6 = $daysOfWeek[4]['date'];
$thu7 = $daysOfWeek[5]['date'];
$chunhat = $daysOfWeek[6]['date'];

// Lấy mã thời gian ca
$thoigianca = $conn->query("SELECT * from thoigianca");
$maca = array();

while ($row = $thoigianca->fetch_assoc()) {
    $maca[] = $row['mathoigianca'];
    $tenca[] = $row['tenthoigianca'];
    $thoigianbatdauca[] = $row['thoigianstar'];
    $thoigianketthucca[] = $row['thoigianend'];
}

if(isset($_POST["lichranh"])){
    $thiss = $_POST["lichranh"];
    
    foreach ($thiss as $ca) {
        // Tách giá trị thành mã ca và thứ
        list($maca, $thu) = explode("_", $ca);
        $them_lichranh = $conn->query("INSERT INTO lichranh (mathoigianca,manv,tuanlichranh,ngay,tennv) 
                                VALUES ('$maca','1','$tuancuanam','$thu','Btrung')");
    }
    if($them_lichranh){
        header("Location:index.php?click=dk_lich&thongbao=thanhcong");
    }
}
?>


<body>
    <div class="container">
        <?php echo $tuancuanam; ?>
        <form id="lichRanhForm" action="" method="post">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="th-title">LỊCH SÚP TRẦN GIA</th>
                        <th class="th-title">Thứ 2</th>
                        <th class="th-title">Thứ 3</th>
                        <th class="th-title">Thứ 4</th>
                        <th class="th-title">Thứ 5</th>
                        <th class="th-title">Thứ 6</th>
                        <th class="th-title">Thứ 7</th>
                        <th class="th-title">Chủ nhật</th>
                    </tr>
                    <tr>
                        <td id="weekRange" class="th-title"> Tuần từ (<?php echo "" . $ngaydautuan->format('d/m') . " - " . $ngaycuoituan->format('d/m') . "" ?>)
                            <br>
                            <?php
                            echo "Năm: " . $namhientai;
                            ?>
                        </td>
                        <td class="th-title"><?php echo $thu2 ?></td>
                        <td class="th-title"><?php echo $thu3 ?></td>
                        <td class="th-title"><?php echo $thu4 ?></td>
                        <td class="th-title"><?php echo $thu5 ?></td>
                        <td class="th-title"><?php echo $thu6 ?></td>
                        <td class="th-title"><?php echo $thu7 ?></td>
                        <td class="th-title"><?php echo $chunhat ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="th-title" name="ca1">
                        <?php
                            echo $tenca[0] . ' (' . $thoigianbatdauca[0] . ' - ' . $thoigianketthucca[0] . ')';
                        ?>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[0]. "_".$thu2.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[0]. "_".$thu3.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[0]. "_".$thu4.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[0]. "_".$thu5.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[0]. "_".$thu6.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[0]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[0]. "_".$chunhat.""?>" id=""></center>
                        </td>
                    </tr>
                    <tr>
                        <td class="th-title" name="ca2">
                        <?php
                            echo $tenca[1] . ' (' . $thoigianbatdauca[1] . ' - ' . $thoigianketthucca[1] . ')';
                        ?>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[1]. "_".$thu2.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[1]. "_".$thu3.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[1]. "_".$thu4.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[1]. "_".$thu5.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[1]. "_".$thu6.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[1]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[1]. "_".$chunhat.""?>" id=""></center>
                        </td>
                    </tr>
                    <tr>
                        <td class="th-title">
                        <?php
                            echo $tenca[2] . ' (' . $thoigianbatdauca[2] . ' - ' . $thoigianketthucca[2] . ')';
                        ?>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[2]. "_".$thu2.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[2]. "_".$thu3.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[2]. "_".$thu4.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[2]. "_".$thu5.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[2]. "_".$thu6.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[2]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[2]. "_".$chunhat.""?>" id=""></center>
                        </td>
                    </tr>
                    <tr>
                        <td class="th-title">
                        <?php
                            echo $tenca[3] . ' (' . $thoigianbatdauca[3] . ' - ' . $thoigianketthucca[3] . ')';
                        ?>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[3]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[3]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[3]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[3]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[3]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[3]. "_".$thu7.""?>" id=""></center>
                        </td>
                        <td>
                            <center><input style="transform : scale(2); " type="checkbox" name="lichranh[]" value="<?php echo "".$maca[3]. "_".$chunhat.""?>" id=""></center>
                        </td>
                    </tr>

                </tbody>
            </table>
            <input style="float: right;" class="btn-primary btn" type="submit" name="btn_dangky" value="Đăng ký">
        </form>


    </div>
</body>
<script>
    // Function to get current date in GMT+7 timezone
    function getCurrentDate() {
        const now = new Date();
        const localTime = now.getTime();
        const localOffset = now.getTimezoneOffset() * 60000; // Offset in milliseconds
        const utc = localTime + localOffset;
        const gmt7Time = utc + (3600000 * 7);
        return new Date(gmt7Time);
    }

    // Function to format date as "day/month"
    function formatDate(date) {
        const day = date.getDate();
        const month = date.getMonth() + 1; // Months are zero-based
        return `${day}/${month}`;
    }

    // Function to populate table with formatted dates
    function populateDates() {
        const currentDate = getCurrentDate();
        const currentDay = currentDate.getDay(); // 0 for Sunday, 1 for Monday, etc.
        for (let i = 2; i <= 8; i++) {
            const dayElement = document.getElementById(`day${i}`);
            const dateToShow = new Date(currentDate);
            const daysToAdd = i - currentDay - 1;
            dateToShow.setDate(currentDate.getDate() + daysToAdd);

            dayElement.textContent = formatDate(dateToShow);

            // Highlight current day
            if (i - 1 === currentDay) {
                dayElement.classList.add('current-day');
            }
        }
    }
    // Call the function to populate dates on page load
    populateDates();
        // Lắng nghe sự kiện khi người dùng đánh dấu ô checkbox
    document.getElementById('lichRanhForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Lấy giá trị của các ô checkbox và gửi dữ liệu lên máy chủ
        // Sử dụng Ajax để gửi dữ liệu
        // Ví dụ sử dụng thư viện jQuery
        $.ajax({
            type: 'POST',
            url: 'process/insert_lichranh.php', // Đường dẫn tới file xử lý dữ liệu trên máy chủ
            data: $(this).serialize(), // Thu thập dữ liệu từ form
            success: function(response) {
                alert('Đăng ký thành công!');
            },
            error: function(error) {
                console.log(error);
                alert('Đã có lỗi xảy ra!');
            }
        });
    });
</script>

</html>