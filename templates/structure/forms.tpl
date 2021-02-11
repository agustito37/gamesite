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
                <section class="signin col hidden-md-down p-4 h-100">
                    <div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
                        <div class="card card-signin my-5">
                          <div class="card-body">
                            {include file=$body}
                          </div>
                        </div>
                      </div>
                </section>
            </div>
        </main>
    </body>
</html>
