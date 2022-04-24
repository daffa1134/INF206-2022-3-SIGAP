<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/TambahDokter.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <title>SIGAP</title>
  </head>
  <body>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contohModal">Launch demo</button>

        <div class="modal fade" id="contohModal" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px; border:none;">
                
                <form id="regForm" action="/action_page.php" method="POST" class="create-form">
                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <div class="input-group"><input type="text" placeholder="Nama Dokter" name="namadokter"></div>
                    <div class="input-group"><input type="text" placeholder="NIP" name="nip"></div>
                    <div class="input-group"><input type="text" placeholder="E-Mail" name="email"></div>
                    <div class="input-group"><input type="text" placeholder="Alamat" name="alamat"></div>

                    <div class="btn" style="overflow:auto;">
                        <div style="float:right;">
                        <button style="width:92px;" type="button" id="prevBtn" onclick="window.history.back();">BATAL</button>
                        <button style="width:92px;" type="button" id="nextBtn" onclick="nextPrev(1)">LANJUT</button>
                        </div>
                    </div>

                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:10px;">
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>

                </div>

                <div class="tab">
                    <div class="input-group"><input type="text" placeholder="Ruangan" name="ruangan"></div>
                    <div class="input-group"><input type="text" placeholder="No. Hp" name="nohp"></div>
                    <div class="input-group"><input type="text" placeholder="Spesialis" name="spesialis"></div>
                    <div class="input-group2" style="display:inline-block; width:45%;padding-right: 5%; float: right;">
                        <input type="text" placeholder="Jam Mulai" name="jammulai">              
                    </div>
                    <div class="input-group2" style="display:inline-block; width:45%; padding-left: 5%; float: left;">
                        <input type="text" placeholder="Jam Selesai" name="jamselesai">              
                    </div>

                    <div class="btn" style="overflow:auto;">
                        <div style="float:right;">
                        <button style="width:92px;" type="button" id="prevBtn" onclick="nextPrev(-1)">KEMBALI</button>
                        <button style="width:92px;" type="button" id="nextBtn" onclick="nextPrev(1)">SELESAI</button>
                        </div>
                    </div>

                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:10px;">
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>

                </div>                
                </form>

                <script>
                    var currentTab = 0; // Current tab is set to be the first tab (0)
                    showTab(currentTab); // Display the current tab

                    function showTab(n) {
                        // This function will display the specified tab of the form...
                        var x = document.getElementsByClassName("tab");
                        x[n].style.display = "block";

                        //... and fix the Previous/Next buttons:
                        if (n == 0) {
                            document.getElementById("prevBtn").innerHTML = "BATAL";
                        } else {
                            document.getElementById("prevBtn").innerHTML = "KEMBALI";
                        }
                        if (n == (x.length - 1)) {
                            document.getElementById("nextBtn").innerHTML = "SELESAI";
                        } else {
                            document.getElementById("nextBtn").innerHTML = "LANJUT";
                        }

                        //... and run a function that will display the correct step indicator:
                        fixStepIndicator(n)
                    }

                    function nextPrev(n) {
                        // This function will figure out which tab to display
                        var x = document.getElementsByClassName("tab");

                        // Exit the function if any field in the current tab is invalid:
                        if (n == 1 && !validateForm()) return false;

                        // Hide the current tab:
                        x[currentTab].style.display = "none";

                        // Increase or decrease the current tab by 1:
                        currentTab = currentTab + n;

                        // if you have reached the end of the form...
                        if (currentTab >= x.length) {
                            // ... the form gets submitted:
                            document.getElementById("regForm").submit();

                            return false;
                        }

                        // Otherwise, display the correct tab:
                        showTab(currentTab);
                    }

                    function validateForm() {
                        // This function deals with validation of the form fields
                        var x, y, i, valid = true;
                        x = document.getElementsByClassName("tab");
                        y = x[currentTab].getElementsByTagName("input");

                        // A loop that checks every input field in the current tab:
                        for (i = 0; i < y.length; i++) {
                            // If a field is empty...
                            if (y[i].value == "") {
                                // add an "invalid" class to the field:
                                y[i].className += " invalid";
                                // and set the current valid status to false
                                valid = false;
                            }
                        }

                        // If the valid status is true, mark the step as finished and valid:
                        if (valid) {
                            document.getElementsByClassName("step")[currentTab].className += " finish";
                        }

                        return valid; // return the valid status
                    }

                    function fixStepIndicator(n) {
                        // This function removes the "active" class of all steps...
                        var i, x = document.getElementsByClassName("step");

                        for (i = 0; i < x.length; i++) {
                            x[i].className = x[i].className.replace(" active", "");
                        }

                        //... and adds the "active" class on the current step:
                        x[n].className += " active";
                    }
                </script>
            </div>   
            </div>
        </div>
  </body>
</html>