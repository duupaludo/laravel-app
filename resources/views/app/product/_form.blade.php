@component('form._form_group',['field' => 'name'])
    {{ Form::label('name','Nome') }}
    {{ Form::text('name',null,['class' => 'form-control'.($errors->has('name')?' is-invalid':'')]) }}
@endcomponent

@component('form._form_group',['field' => 'description'])
    {{ Form::label('description','Descrição') }}
    {{ Form::textarea('description',null,['class' => 'form-control'.($errors->has('description')?' is-invalid':'')]) }}
@endcomponent

@component('form._form_group',['field' => 'price'])
    {{ Form::label('price','Preço') }}
    {{ Form::number('price',null,['step' => '0.01','class' => 'form-control'.($errors->has('price')?' is-invalid':'')]) }}
@endcomponent

@component('form._form_group',['field' => 'thumb'])
    {{ Form::label('thumb','Imagem') }}
    {{ Form::file('thumb',['class' => 'form-control'.($errors->has('thumb')?' is-invalid':'')]) }}
@endcomponent

@component('form._form_group',['field' => 'category_id'])
    {{ Form::label('category_uuid','Categoria') }}
    {{ Form::select('category_uuid',$categories->pluck('name','uuid'),null,['class' => 'form-control'.($errors->has('category_id')?' is-invalid':'')]) }}
@endcomponent

