<!-- Nama       : Rania   -->
<!-- NIM        : 24060122120013   -->
<!-- Lab        : D2   -->
<!-- Tanggal    : 25 September 2024  -->
<!-- File       : show_customers.php -->

<?php include ('./header.php') ?>
<br>
<div class="card">
    <div class="card-header">Show Customers Data</div>
        <div class="card-body">

            <select name="customer" id="customer" class="form-control" onchange="showCustomer(this.value)">
                <option value="">--Select a Customer--</option>

                <?php
                require_once('./lib/db_login.php');
                //Asign a query
                $query = " SELECT * FROM customers ORDER BY customerid";
                $result = $db->query( $query);
                if ( !$result){
                    die ("Could not query the database: <br />". $db->error);
                }

                // Fetch and display the results
                while ($row = $result->fetch_object()){
                    echo '<option value="'. $row->customerid. '">'.$row->name.'</option>';
                }
                $result->free();
                $db->close();
                ?>
            </select>
            <br>
        <div id="detail_customer"></div>
    </div>
</div>
<?php include('./footer.php') ?>