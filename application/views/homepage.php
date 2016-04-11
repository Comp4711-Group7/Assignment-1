<div class="row">
    <div class="col-md-8">
        <div class="row stocks">
            <h3>STOCKS</h3>
            <table style="width:100%">
                <tr>
                    <th>CODE</th>
                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>VALUE</th>
                </tr>
                {stocks}
                <tr>
                    <td>{code}</td>
                    <td><a href="stocks/{code}">{name}</a></td>
                    <td>{category}</td>
                    <td>{value}</td>
                </tr>
                {/stocks}
            </table>
        </div>
        <div class="row stocks">
            <h3>ACTIVE PLAYERS</h3>
            <table style="width:100%">
                <tr>
                    <th>PLAYER</th>
                    <th>CASH</th>
                    <th>EQUITY</th>
                </tr>
                {players}
                <tr>
                    <td><a href="players/{Player}">{Player}</a></td>
                    <td>{Cash}</td>
                    <td>{Equity}</td>
                </tr>
                {/players}
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row stocks">
            <h4>GAME STATUS</h4>
            <div class="gameStatus">
                {gameStatus}
                    round: {round}<br>
                    {message}
                {/gameStatus}
             </div>
        </div>
        <div class="row stocks">
            <h4>RECENT MOVEMENTS</h4>
            <table style="width:100%">
                <tr>
                    <th>seq</th>
                    <th>datetime</th>
                    <th>code</th>
                    <th>action</th>
                    <th>amount</th>
                </tr>
                {recentStockMovements}
                <tr>
                    <td>{seq}</td>
                    <td>{datetime}</td>
                    <td>{code}</td>
                    <td>{action}</td>
                    <td>{amount}</td>
                </tr>
                {/recentStockMovements}
            </table>
        </div>
        <div class="row stocks">
            <h4>RECENT TRANSACTIONS</h4>
            <table style="width:100%">
                <tr>
                    <th>seq</th>
                    <th>datetime</th>
                    <th>agent</th>
                    <th>player</th>
                    <th>stock</th>
                    <th>trans</th>
                    <th>quantity</th>
                </tr>
                {recentStockTrans}
                <tr>
                    <td>{seq}</td>
                    <td>{datetime}</td>
                    <td>{agent}</td>
                    <td>{player}</td>
                    <td>{stock}
                    <td>{trans}</td>
                    <td>{quantity}</td>
                </tr>
                {/recentStockTrans}
            </table>
        </div>
    </div>
</div>