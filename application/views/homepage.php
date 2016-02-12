
<h2 style="text-align:center">Stocks</h2>
<table style="width:100%">
    <tr>
        <th>CODE</th>
        <th>NAME</th>
        <th>CATEGORY</th>
        <th>VALUE</th>
    </tr>
    {stocks}
    <tr>
        <td>{Code}</td>
        <td><a href="stocks/{Code}">{Name}</a></td>
        <td>{Category}</td>
        <td>{Value}</td>
    </tr>
    {/stocks}
</table>


<h2 style="text-align:center">Players</h2>
<table style="width:100%">
    <tr>
        <th>PLAYER</th>
        <th>CASH</th>
    </tr>
    {players}
    <tr>
        <td><a href="players/{Player}">{Player}</a></td>
        <td>{Cash}</td>
    </tr>
    {/players}
</table>