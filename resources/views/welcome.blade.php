<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Truck Builder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        
        <style>
            tbody {
                display:block;
                height:500px;
                overflow:auto;
            }
            thead, tbody tr {
                display:table;
                width:100%;
                table-layout:fixed;/* even columns width , fix width of table too*/
            }
            thead {
                width: calc( 100% - 1em )/* scrollbar is average 1em/16px width, remove it from thead width */
            }
            table {
                width:400px;
            }

        </style>


    </head>
    <body>
        <div class="container">

            <div class="row m-3">
                <a href="/"><h3 class="text-muted"><i class="fas fa-truck-moving"></i> Truck creator </h3></a>
            </div>
            <div class="row">
                <div class="col-lg-8 text-center">
                    <!-- Truck table -->
                    @if(count($trucks) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Brand <a href="/sort/brand_a"><i class="fas fa-sort-up"></i></a>  <a href="/sort/brand_d"><i class="fas fa-sort-down"></i></a> </th>
                                <th>Year made <a href="/sort/year_a"><i class="fas fa-sort-up"></i></a> <a href="/sort/year_d"><i class="fas fa-sort-down"></i></a></th>
                                <th>Owner full name <a href="/sort/name_a"><i class="fas fa-sort-up"></i></a> <a href="/sort/name_d"><i class="fas fa-sort-down"></i></a></th>
                                <th>Owner quantity <a href="/sort/ownerc_a"><i class="fas fa-sort-up"></i></a> <a href="/sort/ownerc_d"><i class="fas fa-sort-down"></i></a></th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trucks as $key => $truck)
                                <tr>
                                    <td> {{ $truck->brandName->name }} </td>
                                    <td> {{ $truck->year_made }} </td>
                                    <td> {{ $truck->full_name }} </td>
                                    <td> {{ $truck->owner_count }} </td>
                                    <td> {{ $truck->comment }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else

                    <i class="text-muted"> There are no trucks yet..</i>

                    @endif
                </div>
                <div class="col-lg-4">
                    <!-- Truck create form -->
                    {!! form($form) !!}
                </div>
            </div>
            



            <div class="row mt-5">
                <div class="col-12 text-center">
                    <i class="text-muted"> Made by Lukas Petkevičius </i>
                </div>
            </div>
        </div>
    </body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>
