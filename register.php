<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Validation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="design.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
</head>

<body>
    <div class="container">
        <form id="registrationForm" class="bd-blue">
        <div id="errorMessages" class="error">
                <script>
                    $(document).ready(function () {
                        $("#registerButton").click(function () {
                            var name = $("#name").val();
                            var gender = $("input[name='gender']:checked").val();
                            var department = $("#department").val();
                            var birthdate = $("#birthdate").val();

                            var errorMessages = [];

                            if (name === "") {
                                errorMessages.push("Vui lòng nhập tên.");
                            }

                            if (!gender) {
                                errorMessages.push("Vui lòng chọn giới tính.");
                            }

                            if (department === "") {
                                errorMessages.push("Vui lòng chọn phân khoa.");
                            }

                            var datePattern = /^\d{2}\/\d{2}\/\d{4}$/;
                            if (birthdate === "" || !datePattern.test(birthdate)) {
                                errorMessages.push("Vui lòng nhập ngày sinh đúng định dạng dd/mm/yyyy.");
                            }

                            if (errorMessages.length > 0) {
                                var errorMessageHtml = "";
                                for (var i = 0; i < errorMessages.length; i++) {
                                    errorMessageHtml += errorMessages[i] + "<br>";
                                }
                                $("#errorMessages").html(errorMessageHtml);
                            } else {
                                $("#errorMessages").html("");
                            }
                        });
                    });
                </script>
            </div>

            <div class="form-group">
                <div class="bg-green text-white bd-blue p-10-20 w-30 text-center required-label me-20" for="name">Họ và tên</div>
                <input class="bd-blue fl-1" type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <div class="bg-green text-white bd-blue p-10-20 w-30 text-center required-label me-20 " for="gender">Giới tính</div>
                <div id="gender" name="gender" class = "w-170">
                    <input type="radio" id="male" name="gender" value="Nam" required> Nam
                    <input type="radio" id="female" name="gender" value="Nữ" required> Nữ
                </div>
            </div>

            <div class="form-group">
                <div class="bg-green text-white bd-blue p-10-20 w-30 text-center required-label me-20" for="department">Phân khoa</div>
                <select id="department" name="department" class="bd-blue py-10">
                    <option value="">--Chọn phân khoa--</option>
                    <?php
                    $departments = array('MAT' => 'Khoa học máy tính', 'KDL' => 'Khoa học vật liệu');
                    foreach ($departments as $key => $value) {
                        echo "<option value=\"$key\">$value</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <div class="bg-green text-white bd-blue p-10-20 w-30 text-center required-label me-20 w-170" for="birthdate">Ngày sinh</div>
                <input class="bd-blue w-170" type="text" id="birthdate" name="birthdate" placeholder="dd/mm/yyyy" required>
            </div>      
            <div class="d-flex">
                <div class="bg-green text-white bd-blue p-10-20 w-30 text-center me-20 address-label" for="address">Địa chỉ</div>
                <input class="bd-blue fl-1 address-input" type="text" id="address" name="address">
            </div>
            

            <div class="button-container" id="registerButton">
                <button type="submit">Đăng ký</button>
            </div>
        </form>
    </div>

</body>

</html>
