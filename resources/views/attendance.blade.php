<!DOCTYPE html>
<html>
<head>
    <title>Attendance Management</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        #my_camera {
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
        }

        #results {
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            text-align: center;
            margin-top: 20px;
        }

        input[type="button"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #218838;
        }

        .text-danger {
            color: #dc3545;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }
        .select2-container {
            width: 100% !important;
        }
    </style>

</head>
<body>

<div class="container">
    <h1>Shabuj Glonbal Attendance Management</h1>

    <form id="myForm" >

        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type="button" value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
                <div class="mt-3 email" style="display: none;">
                    <label>Email:</label>
                    <select name="email" title="email" class="form-control select2">
                    <option value="" disabled selected>Select an email</option>
                      @foreach ($users as $user )
                            <option value="{{$user->id}}" data-name="{{ $user->name }}">{{$user->email}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 text-center mt-4">
                <span class="text-danger">{{ $errors->first('image') }}</span>
                <span class="text-danger">{{ $errors->first('email') }}</span>
                <br/>
                <button class="btn btn-success mr-2" onclick="submitForm('in')" style="background-color: #28a745;">In Attendance</button>
<button class="btn btn-success mr-2" onclick="submitForm('out')" style="background-color: #007bff;">Out Attendance</button>
<button class="btn btn-success mr-2" onclick="submitForm('break_in')" style="background-color: #ffc107;">Break In</button>
<button class="btn btn-success" onclick="submitForm('break_out')" style="background-color: #dc3545;">Break Out</button>

            </div>
        </div>
    </form>
</div>


<script>
    $(".select2").select2({
        placeholder: "Select an email",


    });
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';

        } );
        $('.email').show();
    }

    function submitForm(type) {
    event.preventDefault();
    var selectedOption = $('select[name="email"] option:selected');
    var email = selectedOption.val();
    var emailText = selectedOption.text();
    var name = selectedOption.data('name');
    var attendanceTypeName = '';

    // Set the attendance type name based on the 'type' parameter
    switch (type) {
        case 'in':
            attendanceTypeName = 'In Attendance';
            break;
        case 'out':
            attendanceTypeName = 'Out Attendance';
            break;
        case 'break_in':
            attendanceTypeName = 'Break In';
            break;
        case 'break_out':
            attendanceTypeName = 'Break Out';
            break;
        default:
            attendanceTypeName = 'Unknown';
            break;
    }

    if (!email) {
        Swal.fire({
            title: 'Error!',
            text: 'Please select an email.',
            icon: 'error',
            confirmButtonColor: '#3085d6',
        });
        return;
    }

    // If the type is 'Break In' or 'Break Out', prompt the user for a note input
    var notePrompt = '';
    if (type === 'break_in' || type === 'break_out') {
        notePrompt = {
            title: 'Enter a Note (Optional)',
            input: 'text',
            inputPlaceholder: 'Enter your note here...',
            showCancelButton: true,
        };
    }

    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to submit ${attendanceTypeName} for ${name} (${emailText}).`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, submit it!',
        ...notePrompt, // Spread the notePrompt object if it's not empty
    }).then((result) => {
        if (result.isConfirmed) {
            var note = "";
            if (type === 'break_in' || type === 'break_out') {
             note = result.value ? result.value.trim() : '';
            }
            submitAttendance(email, type, note);
        }
    });
}



    function submitAttendance(email,type,note="") {
        var imageData = $('.image-tag').val();

        var formData = new FormData();
        formData.append('image', imageData);
        formData.append('email', email);
        formData.append('type', type);
        formData.append('note', note);
        axios.post('https://app.shabujglobal.com/api/submit-attendance', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then(function(response) {
                console.log(response.data);
                // Show success message
                Swal.fire(
                    'Success!',
                    'Attendance submitted successfully.',
                    'success'
                );

                 //location.reload()
            })
            .catch(function(error) {

                console.error(error.response.data);
                let errorMessage = error.response.data.message || 'Failed to submit attendance.';

    Swal.fire(
        'Error!',
        errorMessage,
        'error'
    );
            });
    }
</script>

</body>
</html>
