{stockprofile}
<h3 style="text-align:center">{Name}</h3>
{/stockprofile}

<h4>Movements</h4>

<table style="width:100%">
    <tr>
        <th>DATE</th>
        <th>ACTION</th>
        <th>AMOUNT</th>
    </tr>
    {stockmovements}
    <tr>
        <td>{Datetime}</td>
        <td>{Action}</td>
        <td>{Amount}</td>
    </tr>
    {/stockmovements}
</table>

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

{stocksdropdown}