<thead>
<tr role="row">
    <th>Category Name</th>
    @foreach($teams as $team)
        <th>{{$team->name}}</th>
    @endforeach
</tr>
</thead>
<tbody>
@foreach($rows as $row)
    <tr class="gradeA" role="row">
        <td>{{ $row->name}}</td>
        @foreach($teams as $team)
            <td>{{ $row->sets()->where('team_id',$team->id)->first() ? $team->score : 0}}</td>
        @endforeach
    </tr>
@endforeach
<tr class="gradeA" role="row">
    <td>Total Score</td>
    @foreach($teams as $team)
        <td>{{ $team->score}}</td>
    @endforeach
</tr>
</tbody>
<tfoot>
<tr role="row">
    <th>Category Name</th>
    @foreach($teams as $team)
        <th>{{$team->name}}</th>
    @endforeach
</tr>
</tfoot>