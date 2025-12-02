@if($count == 0)
<p style="color:red; text-align:center; font-size:18px;">
    No se ha encontrado ninguna película
</p>
@else
<p>
    hay {{ $count }} películas.
</p>
@endif