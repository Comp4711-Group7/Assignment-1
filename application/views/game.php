<hr>
<div class="row">
    <div class="col-md-2">
        <img src="http://placehold.it/150x150">
    </div>
    <div class="col-md-10">
        Name: <br>
        Cash:  <br>
    </div>
</div>

<hr>
<h4>Your Current Holdings</h4>
<table style="width:100%">
    <tr>
        <th>CODE</th>
        <th>NAME</th>
        <th>CATEGORY</th>
        <th>VALUE</th>
    </tr>
<!--    {stockprofile}-->
<!--    <tr>-->
<!--        <td>{code}</td>-->
<!--        <td>{name}</td>-->
<!--        <td>{category}</td>-->
<!--        <td>{value}</td>-->
<!--    </tr>-->
<!--    {/stockprofile}-->
</table>

<div class="row stock-status">
    <div class="col-md-7">
        <h4>Market</h4>

        <table style="width:100%">
            <tr>
                <th>CODE</th>
                <th>NAME</th>
                <th>CATEGORY</th>
                <th>VALUE</th>
                <th></th>
            </tr>
            {stocks}
            <tr>
                <td>{code}</td>
                <td>{name}</td>
                <td>{category}</td>
                <td>{value}</td>
                <td><a href="#">BUY</a></td>
            </tr>
            {/stocks}
        </table>

    </div>
    <div class="col-md-5">
        <h4>Trend</h4>
        <table style="width:100%">
            <tr>
                <th>DATE</th>
                <th>PLAYER</th>
                <th>TRANSACTION</th>
                <th>QUANTITY</th>
            </tr>
<!--            {stocktransactions}-->
<!--            <tr>-->
<!--                <td>{DateTime}</td>-->
<!--                <td>{Player}</td>-->
<!--                <td>{Trans}</td>-->
<!--                <td>{Quantity}</td>-->
<!--            </tr>-->
<!--            {/stocktransactions}-->
        </table>
    </div>
</div>
