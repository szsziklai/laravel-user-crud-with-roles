<!-- Modal -->
<div class="modal fade" id="translate-modal-{{ $field }}" tabindex="-1" role="dialog" aria-labelledby="asd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ trans('locale.translate') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @php
                        $first = true
                    @endphp
                    @foreach(Config::get('app.translatable_languages') as $language)
                    <li class="nav-item">
                        <a @if($first) class="nav-link active" @else class="nav-link" @endif id="{{ $field }}-{{ $language }}-tab" data-toggle="tab" href="#{{ $field }}-{{ $language }}" role="tab" aria-controls="{{ $field }}-{{ $language }}" aria-selected="true">{{ trans('locale.' . $language) }}</a>
                        @php
                            $first = false
                        @endphp
                    </li>
                    @endforeach
                </ul>
                @php
                    $first = true
                @endphp
                <div class="tab-content" id="myTabContent">
                    @foreach(Config::get('app.translatable_languages') as $language)
                        @if($type == 'textfield')
                            <div @if($first) class="tab-pane fade show active" @else class="tab-pane fade show" @endif id="{{ $field }}-{{ $language }}" role="tabpanel" aria-labelledby="{{ $field }}-{{ $language }}-tab">{{ Form::text($field . '_' . $language, @locale_trans($data, $field, $language), ['class' => $errors->has($field) ? 'form-control is-invalid ' : 'form-control']) }}</div>
                        @endif
                        @php
                            $first = false
                        @endphp
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('buttons.cancel') }}</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('buttons.confirm') }}</button>
            </div>
        </div>
    </div>
</div>