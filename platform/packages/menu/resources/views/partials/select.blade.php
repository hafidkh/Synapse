<ul {!! $options !!}>
    @foreach ($items as $key => $row)
        @php
            $id = 'menu-id-' . strtolower(Str::slug(str_replace('\\', ' ', get_class($model)))) . '-' . $row->id;
        @endphp

        <li>
            <x-core::form.checkbox
                :label="$row->name"
                name="menu_id"
                :id="$id"
                :value="$row->id"
                data-title="{{ $row->name }}"
                data-reference-id="{{ $row->id }}"
                data-reference-type="{{ get_class($model) }}"
                data-menu-id="{{ BaseHelper::stringify(request()->route('menu')) }}"
            />

            @if ($row->children)
                {!! Menu::generateSelect([
                    'model' => $model,
                    'items' => $row->children,
                    'class' => 'list-unstyled',
                ]) !!}
            @endif
        </li>
    @endforeach
</ul>
