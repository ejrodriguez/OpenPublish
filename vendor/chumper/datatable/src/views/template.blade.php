<table id="{{ $id }}" class="{{ $class }}"  cellspacing="0" width="100%">
    <colgroup>
        @for ($i = 0; $i < count($columns); $i++)
        <col class="con{{ $i }}" />
        @endfor
    </colgroup>
    <thead>
    <tr>
        @foreach($columns as $i => $c)
        <th align="center" valign="middle" class="head{{ $i }}">{{ $c }}</th>
        @endforeach
    </tr>
    </thead>
   <tbody>
    @foreach($data as $d)
    <tr id= "video">
        @foreach($d as $dd)
        <td>{{ $dd }}</td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>

@if (!$noScript)
    @include('datatable::javascript', array('id' => $id, 'options' => $options, 'callbacks' =>  $callbacks))
@endif