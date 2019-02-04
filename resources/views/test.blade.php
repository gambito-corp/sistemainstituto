<h1>HOLA MUNDO</h1>
<a href="{{route('home')}}">home</a>

<h2>Estos Datos fueron obtenidos solo de una tabla con relaciones de Eloquent</h2>
@forelse($ciclos as $ciclo)


<p>
    {{$ciclo->userCiclo->name}}
    cursa la carrera de {{$ciclo->carreraCiclo->nombre}}
</p>
<p>
    esta asistiendo en este momento al curso de
    {{$ciclo->cursoCiclo->nombre}}  estamos en el {{$ciclo->nombre}}
</p>


<hr>
<br>
@empty
<h2>no hay usuarios</h2>
@endforelse