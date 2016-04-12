<hr>
<table style="width:100%">
    <tr>
        <th>CODE</th>
        <th>NAME</th>
        <th>CATEGORY</th>
        <th>VALUE</th>
    </tr>
    {stockprofile}
    <tr>
        <td>{code}</td>
        <td>{name}</td>
        <td>{category}</td>
        <td>{value}</td>
    </tr>
    {/stockprofile}
</table>

<div class="row stock-status">
    <div class="col-md-6">
        <h4>Movements</h4>

        <table style="width:100%">
            <tr>
                <th>SEQ</th>
                <th>DATETIME</th>
                <th>ACTION</th>
                <th>AMOUNT</th>
            </tr>
            {stockmovements}
            <tr>
                <td>{seq}</td>
                <td>{datetime}</td>
                <td>{action}</td>
                <td>{amount}</td>
            </tr>
            {/stockmovements}
        </table>

    </div>
    <div class="col-md-6">
        <h4>Transactions</h4>
        <table style="width:100%">
            <tr>
                <th>DATE</th>
                <th>PLAYER</th>
                <th>TRANSACTION</th>
                <th>QUANTITY</th>
            </tr>
            {stocktransactions}
            <tr>
                <td>{DateTime}</td>
                <td>{Player}</td>
                <td>{Trans}</td>
                <td>{Quantity}</td>
            </tr>
            {/stocktransactions}
        </table>
    </div>
</div>
