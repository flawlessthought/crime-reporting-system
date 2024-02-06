<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    // ... (your existing PHP code)
    ?>

    <title>Incharge Homepage</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- Add a link to your custom CSS file for print styling -->
    <link rel="stylesheet" type="text/css" href="print-style.css">
    
    <script>
        function f1() {
            var sta2 = document.getElementById("ciid").value;
            var x2 = sta2.indexOf(' ');
            if (sta2 == "" && x2 >= 0) {
                document.getElementById("ciid").value = "";
                alert("Blank Field Not Allowed");
            }
        }

        // JavaScript function to handle printing
        function printComplaints() {
            var printWindow = window.open('', '_blank');

            printWindow.document.write('<html><head><title>Print</title>');
            printWindow.document.write('<link rel="stylesheet" type="text/css" href="print-style.css">');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h1>Complaints</h1>');
            printWindow.document.write(document.getElementById('complaintsTable').innerHTML);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();
        }
    </script>
</head>
<body>
    <!-- Your existing HTML content -->

    <!-- Add a Print button -->
    <button onclick="printComplaints()" class="btn btn-primary">Print Complaints</button>

    <!-- Modify the table with an ID for printing -->
    <div style="padding:50px; margin-top:10px;" id="complaintsTable">
       <table class="table table-bordered">
        <!-- ... (your existing table code) -->
       </table>
    </div>

    <!-- Your remaining HTML content -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
