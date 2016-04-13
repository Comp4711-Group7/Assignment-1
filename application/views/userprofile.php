<hr>

<br>
<div style="text-align: center">{userdropdown}</div>

<h3>Transactions</h3>


<table style="width:100%">
    <tr>
        <th>DATE</th>
        <th>STOCK</th>
        <th>ACTION</th>
        <th>QUANTITY</th>
    </tr>
    {userprofile}
    <tr>
        <td>{DateTime}</td>
        <td>{Stock}</td>
        <td>{Trans}</td>
        <td>{Quantity}</td>
    </tr>
    {/userprofile}
</table>

</br>

<h3>Player Holdings</h3>
<table style="width:100%">
    <tr>
        <th>STOCK</th>
        <th>TOTAL</th>
    </tr>
    {userholdings}
    <tr>
        <td>{stock}</td>
        <td>{quantity}</td>
    </tr>
    {/userholdings}
</table>

