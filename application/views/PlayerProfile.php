<hr>

<br>
<div style="text-align: center">{playerdropdown}</div>

<h3>Transactions</h3>


<table style="width:100%">
    <tr>
        <th>DATE</th>
        <th>STOCK</th>
        <th>ACTION</th>
        <th>QUANTITY</th>
    </tr>
    {playerprofile}
    <tr>
        <td>{DateTime}</td>
        <td>{Stock}</td>
        <td>{Trans}</td>
        <td>{Quantity}</td>
    </tr>
    {/playerprofile}
</table>

</br>

<h3>Player Holdings</h3>
<table style="width:100%">
    <tr>
        <th>STOCK</th>
        <th>TOTAL</th>
    </tr>
    {playerholdings}
    <tr>
        <td>{stock}</td>
        <td>{quantity}</td>
    </tr>
    {/playerholdings}
</table>

