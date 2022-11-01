<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="./script/javascript.js"></script>



    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Stock</h3>
            </div>
        </div>
        <form>
            <div class="row">
                
                <div class="col">
                    <div class="btn-group">
                                <button type="button" id="stockdata" onclick ="fetch_forecast_data(this.textContent)" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Select a value
                                </button>
                                <div class="dropdown-menu">
                                    
                      <?php
                        $servername = "172.17.0.4";
                        $username = "root";
                        $password = "1234";
                        $dbname = "trade_db";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT stock_name FROM trade_forecast_details";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {  ?> 
                            <a class="dropdown-item" style="color: green" onclick="getValue(this.textContent,'stockdata','green')" href="#">
                            <?php
                                echo " " . $row["stock_name"] . " ";   ?> 
                                </a>
                                <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>

                                </div>
                            </div>
                </div>
                <div class="col">
                   
                    <input class="form-control form-control-lg" id="stockName" type="text" placeholder="stockName">
                      
               
                </div>
            </div>


            <div class="row">
            <?php
                        $servername = "172.17.0.4";
                        $username = "root";
                        $password = "1234";
                        $dbname = "trade_db";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT p_open,p_high,p_low,p_close,t_close,t_low,t_high,t_open FROM trade_forecast_details where stock_name='Nifty011122' ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {  ?>   


                <div class="col">
                    <h3> Previous day data</h3>
                    Previous day open:
                    <input class="form-control form-control-lg" id="previosdayOpen" onchange="calculateSignal()" type="text" placeholder="previousdayOpen" value="<?php echo " " . $row["p_open"] . " ";   ?> ">
                    Previous day high:
                    <input class="form-control form-control-lg" id="previosdayHigh" onchange="calculateSignal()" type="text" placeholder="previousdayHigh" value="<?php echo " " . $row["p_high"] . " ";   ?> ">
                    Previous day low:
                    <input class="form-control form-control-lg" id="previosdayLow" onchange="calculateSignal()" type="text" placeholder="previousdayLow" value="<?php echo " " . $row["p_low"] . " ";   ?> ">
                    Previous day close:
                    <input class="form-control form-control-lg" id="previosdayClose" onchange="calculateSignal()" type="text" placeholder="previousdayClose" value="<?php echo " " . $row["p_close"] . " ";   ?> ">


                    <!-- <button type="button" class="btn btn-primary">Primary</button> -->
                    <!-- <button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>
<button type="button" class="btn btn-link">Link</button> -->

                </div>
                <div class="col">
                    <h3> Today data</h3>
                    Today open:
                    <input class="form-control form-control-lg" id="todayOpen" type="text" onchange="calculateSignal()" placeholder="TodayOpen" value="<?php echo " " . $row["t_open"] . " ";   ?> ">
                    Today high:
                    <input class="form-control form-control-lg" id="todayHigh" type="text" onchange="calculateSignal()" placeholder="TodayHigh" value="<?php echo " " . $row["t_high"] . " ";   ?> "> 
                    Today low:
                    <input class="form-control form-control-lg" id="todayLow" type="text" onchange="calculateSignal()" placeholder="TodayLow" value="<?php echo " " . $row["t_low"] . " ";   ?> ">
                    Today close:
                    <input class="form-control form-control-lg" id="todayClose" type="text" onchange="calculateSignal()" placeholder="TodayClose" value="<?php echo " " . $row["t_close"] . " ";   ?> ">


                    <!-- <button type="button" onclick="a()" class="btn btn-primary">Calculate signal</button> -->
                    <!-- <button type="button" class="btn btn-secondary">Secondary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-light">Light</button>
        <button type="button" class="btn btn-dark">Dark</button>
        <button type="button" class="btn btn-link">Link</button> -->
                </div>

                <div class="col">
                    <h3> Calc data</h3>
                    ATR in one day chart:
                    <input class="form-control form-control-lg" type="text" onchange="calculateSignal()" placeholder="ATR">
                    Current price:
                    <input class="form-control form-control-lg" id="c_price" type="text" onchange="calculateSignal()" placeholder="CurrentPrice">
                    Open change:
                    <label id="percentageChange"> </label> % , value is
                    <label id="valueChange"> </label>
                    <br>
                    Current change:
                    <label id="c_percentageChange"> </label> % , value is
                    <label id="c_valueChange"> </label>
                    <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                    <div class="row">
                        <div class="col">
                            Stochastic:</div>
                        <div class="col">
                            <div class="btn-group">
                                <button type="button" id="stochastic" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Select a value
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" style="color: green" onclick="getValue(this.textContent,'stochastic','green')" href="#">Green</a>
                                    <a class="dropdown-item" style="color: tomato;" onclick="getValue(this.textContent,'stochastic','tomato')" href="#">Red</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">RSI:</label>
                        </div>
                        <div class="col">
                            <div class="btn-group">
                                <button id="RSI" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Select a value
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="strongbuy" href="#" style="color: green" onclick="getValue(this.textContent,'RSI','green')" value="Raises from zero and crossed 20">Raises from zero and crossed 20</a>
                                    <a class="dropdown-item" id="normal buy" href="#" style="color: green" onclick="getValue(this.textContent,'RSI','green')" value="Raises / probable buy">Raises / probable buy </a>
                                    <a class="dropdown-item" id="strongsell" style="color: tomato;" href="#" onclick="getValue(this.textContent,'RSI','tomato')" value="Falls from 100 to 80">Falls from 100 to 80</a>
                                    <a class="dropdown-item" id="normal sell" style="color: tomato;" href="#" onclick="getValue(this.textContent,'RSI','tomato')" value="Falls / probable sell">Falls / probable sell</a>
                                </div>
                            </div>
                        </div>




                    </div>


                </div>
        </form>



    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Signals </h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p><label id="action" value="action"> action: </label> <br>
                    <label id="signal_buy" class="alert alert-success" style="display:none" role="alert">
                        Buy it
                    </label>

                    <label id="signal_be_ready" class="alert alert-warning" role="alert">
                        Hold on!!
                    </label>

                    <label id="signal_sell" class="alert alert-danger" style="display:none" role="alert">
                        Sell
                    </label>

                </p>
            </div>
            <div class="col">

                <label value="Buy Price"> Entry price: </label>
                <input class="form-control form-control-lg" id="buyprice" onchange="a()" type="text" placeholder="buyprice">

            </div>
            <div class="col">

                <label value="qty"> Quantity: </label>
                <input class="form-control form-control-lg" id="qty" onchange="a()" type="text" placeholder="qty">

            </div>
            <div class="col">
                <label value="target Price"> target price: </label>
                <div class="alert alert-info" id="target" role="alert">
                    target price
                </div>
            </div>


            <div class="col">
                <label value="SL"> SL: </label>
                <div class="alert alert-info" id="SL" role="alert">
                    SL
                </div>
            </div>
            <div class="col">
                <label> sold price: </label>
                <input class="form-control form-control-lg" id="Sellprice" onchange="a()" type="text" placeholder="Sellprice">

            </div>
            <div class="col">
                <label> Outcome: </label>
                <div class="alert alert-info" role="alert" id="Outcome" value="Outcome">
                    Outcome
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
              
            </div>
            <div class="col">

           
            </div>
            <div class="col">

             
            </div>
            <div class="col">
                <label value="target Price"> target price: </label>
                <div class="alert alert-info" id="targetshort" role="alert">
                    target price
                </div>
            </div>


            <div class="col">
                <label value="SL"> SL: </label>
                <div class="alert alert-info" id="shortSL" role="alert">
                    SL
                </div>
            </div>
            <div class="col">
                <label> sold price: </label>
                <input class="form-control form-control-lg" id="shortSellprice" onchange="a()" type="text" placeholder="Sellprice">

            </div>
            <div class="col">
                <label> Outcome: </label>
                <div class="alert alert-info" role="alert" id="shortOutcome" value="Outcome">
                    Outcome
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Trade Details - <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                    <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                </svg></h3>
            </div>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Transaction type</th>
                        <th scope="col">stock_name</th>
                        <th scope="col">entry</th>
                        <th scope="col">target</th>
                        <th scope="col">SL</th>
                        <th scope="col">exit</th>
                        <th scope="col">Outcome</th>
                        <th scope="col">qty</th>
                        <th scope="col">comment</th>
                        <th scope="col">date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <?php
                        $servername = "172.17.0.4";
                        $username = "root";
                        $password = "1234";
                        $dbname = "trade_db";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT mode, stock_name, entry,exit_price,target,sl,date,outcome,qty,comment FROM trade_details";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {  ?> 
                    <tr>
                        <th scope="row">1</th>
                        <td>

                    <?php
                                echo " " . $row["mode"] . " ";   ?> 
                        </td>
                        <td>
                        <?php
                                echo " " . $row["stock_name"] . " ";   ?> 
                              
                        </td>

                        <td>
                        <?php
                                echo " " . $row["entry"] . " ";   ?> 
                              
                        </td>

                        <td>
                        <?php
                                echo " " . $row["target"] . " ";   ?> 
                              
                        </td>
                        <td>
                        <?php
                                echo " " . $row["sl"] . " ";   ?> 
                              
                        </td>
                        <td>
                        <?php
                                echo " " . $row["exit_price"] . " ";   ?> 
                              
                        </td>
                        <td>
                        <?php
                                echo " " . $row["outcome"] . " ";   ?> 
                              
                        </td>
                        <td>
                        <?php
                                echo " " . $row["qty"] . " ";   ?> 
                              
                        </td>
                        <td>
                        <?php
                                echo " " . $row["comment"] . " ";   ?> 
                              
                        </td>

                        <td> <?php
                                echo " " . $row["date"] . " ";   ?> </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>

</body>

</html>