<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    {include file='./head.tpl'}
    <body class="bg-dark">
        {include file='./navigation.tpl'}
        <main class="container-fluid">
            <div class="row  h-100">
                {include file=$body}
                {include file='./aside.tpl'}
            </div>
        </main>
    </body>
</html>
