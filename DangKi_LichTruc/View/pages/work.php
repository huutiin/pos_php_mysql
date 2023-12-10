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
include "config.php";
$thoigianca1 = $conn->query("SELECT tenthoigianca, thoigianstar,thoigianend FROM thoigianca where tenthoigianca='Ca 1'");
$thoigianca2 = $conn->query("SELECT tenthoigianca, thoigianstar,thoigianend FROM thoigianca where tenthoigianca='Ca 2'");
$thoigianca3 = $conn->query("SELECT tenthoigianca, thoigianstar,thoigianend FROM thoigianca where tenthoigianca='Ca 3'");
$thoigiancaht = $conn->query("SELECT tenthoigianca, thoigianstar,thoigianend FROM thoigianca where tenthoigianca='Ca hỗ trợ'");

?>
<?php
// // Lấy ngày đầu tiên của tháng
// $firstDayOfMonth = date('Y-m-01');

// // Lấy ngày hiện tại
// $currentDate = date('Y-m-d');

// // Chuyển đổi các ngày sang đối tượng DateTime
// $firstDay = new DateTime($firstDayOfMonth);
// $currentDay = new DateTime($currentDate);

// // Tính số tuần
// $interval = $firstDay->diff($currentDay);
// $currentWeekNumber = floor($interval->days / 7) + 1;

// echo "Tuần hiện tại của tháng là: $currentWeekNumber";
//
// Lấy số tuần hiện tại của tháng

    date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ theo GMT+7
    $tuancuanam = date('W');

    
    // Lấy ngày hiện tại
    $currentDate = new DateTime();
    $namhientai = date('Y');

    // Lấy ngày đầu tiên trong tuần
    $ngaydautuan = clone $currentDate;
    $ngaydautuan->modify('this week'); // 'this week' để lấy ngày đầu tiên của tuần hiện tạ
    // Lấy ngày cuối cùng trong tuần
    $ngaycuoituan = clone $ngaydautuan;
    $ngaycuoituan->modify('Sunday'); // 'Sunday' để lấy ngày cuối cùng của tuầ
    // Hiển thị kết quả

?>

<body>
    <div class="container">
        <?php echo $tuancuanam; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="th-title">LỊCH SÚP TRẦN GIA</th>
                    <th class="th-title" >Thứ 2</th>
                    <th class="th-title" >Thứ 3</th>
                    <th class="th-title" >Thứ 4</th>
                    <th class="th-title" >Thứ 5</th>
                    <th class="th-title" >Thứ 6</th>
                    <th class="th-title" >Thứ 7</th>
                    <th class="th-title" >Chủ nhật</th>
                </tr>
                <tr> 
                    <td id="weekRange" class="th-title"> Tuần từ (<?php echo "".$ngaydautuan->format('d/m')." - ".$ngaycuoituan->format('d/m')."" ?>)
                    <br>
                    <?php 
                        echo "Năm: ".$namhientai;
                    ?>
                    </td>
                    <td class="th-title" id="day2"></td>
                    <td class="th-title" id="day3"></td>
                    <td class="th-title" id="day4"></td>
                    <td class="th-title" id="day5"></td>
                    <td class="th-title" id="day6"></td>
                    <td class="th-title" id="day7"></td>
                    <td class="th-title" id="day8"></td>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="th-title">
                    <?php 
                        foreach ($thoigianca1 as $key => $value) {
                            // Chuyển đổi thời gian từ định dạng mặc định sang "H:i"
                            $thoigianstar_formatted = date('H:i', strtotime($value["thoigianstar"]));
                            $thoigianend_formatted = date('H:i', strtotime($value["thoigianend"]));

                            // Hiển thị thông tin với thời gian đã định dạng
                            echo $value["tenthoigianca"] . ' (' . $thoigianstar_formatted . ' - ' . $thoigianend_formatted . ')';
                        } 
                    ?>

                    </td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                </tr>
                <tr>
                    <td class="th-title">
                    <?php 
                    foreach ($thoigianca2 as $key => $value) {
                        // Chuyển đổi thời gian từ định dạng mặc định sang "H:i"
                        $thoigianstar_formatted = date('H:i', strtotime($value["thoigianstar"]));
                        $thoigianend_formatted = date('H:i', strtotime($value["thoigianend"]));

                        // Hiển thị thông tin với thời gian đã định dạng
                        echo $value["tenthoigianca"] . ' (' . $thoigianstar_formatted . ' - ' . $thoigianend_formatted . ')';
                    } 
                    ?>

                    </td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                </tr>
                <tr>
                    <td class="th-title">
                    <?php 
                    foreach ($thoigianca3 as $key => $value) {
                        // Chuyển đổi thời gian từ định dạng mặc định sang "H:i"
                        $thoigianstar_formatted = date('H:i', strtotime($value["thoigianstar"]));
                        $thoigianend_formatted = date('H:i', strtotime($value["thoigianend"]));

                        // Hiển thị thông tin với thời gian đã định dạng
                        echo $value["tenthoigianca"] . ' (' . $thoigianstar_formatted . ' - ' . $thoigianend_formatted . ')';
                    } 
                    ?>

                    </td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                </tr>
                <tr>
                    <td class="th-title">
                        <?php 
                        foreach ($thoigiancaht as $key => $value) {
                            // Chuyển đổi thời gian từ định dạng mặc định sang "H:i"
                            $thoigianstar_formatted = date('H:i', strtotime($value["thoigianstar"]));
                            $thoigianend_formatted = date('H:i', strtotime($value["thoigianend"]));
    
                            // Hiển thị thông tin với thời gian đã định dạng
                            echo $value["tenthoigianca"] . ' (' . $thoigianstar_formatted . ' - ' . $thoigianend_formatted . ')';
                        } 
                        ?>
                    </td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                    <td>Bảo Trung</td>
                </tr>
                <tr>
                    <td class="th-title">Trực vệ sinh tuần</td>
                    <td colspan="7"><center>Tao</center></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<!-- Thêm thư viện moment.js -->

<!-- <script>
    // Lấy ngày đầu tiên của tháng và điều chỉnh theo múi giờ GMT+7
    var firstDayOfMonth = moment().startOf('month');
    var firstDayOfMonthGMT7 = firstDayOfMonth.clone().utcOffset('+07:00', true);
    var firstDayOfWeek = firstDayOfMonthGMT7.clone().isoWeekday(0); // Lấy ngày đầu tiên của tuần (thứ Hai)

    // Tạo mảng chứa các thẻ td chứa ngày
    var dateCells = [];

    // Lặp qua từng ngày trong tuần
    for (var i = 0; i < 7; i++) {
        var currentDate = firstDayOfWeek.clone().add(i, 'days');
        dateCells.push('<td>' + currentDate.format('DD/MM') + '</td>');
    }

    // Hiển thị ngày trong bảng

    // Đánh dấu vị trí thêm ngày trong tháng
    var positionsToAddDate = [2, 3, 4, 5, 6, 7, 8]; // Đây là ví dụ, bạn cần điều chỉnh để phù hợp với yêu cầu thực tế

    // Động lực hóa ô chứa ngày tại các vị trí đã đánh dấu
    positionsToAddDate.forEach(function (position) {
        document.getElementById('day' + position).innerHTML += '<br>' + firstDayOfWeek.clone().add(position - 1, 'days').format('DD/MM');
    });
    var lastDayOfWeek = firstDayOfWeek.clone().endOf('week');

    document.getElementById('weekRange').innerHTML = 'Tuần từ (' + firstDayOfWeek.format('DD/MM') + ' - ' + lastDayOfWeek.format('DD/MM') + ')';    
    
</script> -->
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
</script>

</html>