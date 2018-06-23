@if(isset($result)&& $result != null)
    <thead>
    <tr>
        @foreach($title as $b)
            <th>{{$b}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($result as $a)
        <tr>
            @foreach($a as $d)
                <td>{{$d}}</td>
            @endforeach
        </tr>
    @endforeach
    @if(isset($total) && $total !=  null)
        <tr style="background-color: #e1e1e1; font-weight: bold">
            <td>Tổng</td>
            @foreach($total as $c)
                <td>{{$c}}</td>
            @endforeach
        </tr>
    @endif
    </tbody>
@endif