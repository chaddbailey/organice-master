<html>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($distance as $dist)
        <tr>
            <td>{{$dist->partner_id}}</td>
            <td>Request</td>
           
        </tr>
        @endforeach
    </tbody>
</table>
</html>