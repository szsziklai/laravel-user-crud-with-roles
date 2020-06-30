<?php

namespace App\Traits;

trait TranslateTrait {

    public function translate() {
        return $this->hasMany('App\Model\Translate\Translate', 'fid', 'id')->where('model_name', $this->model_name);
    }

    /**
     * Attach new translate to model, or modify an existed.
     *
     * @param  \Illuminate\Http\Request  $request->all()
     * @return bool
     */
    public function attach_translate($request) {
        $count = count($this->translate);
        foreach ($this->translatables as $translatable => $type) {
            foreach (config('app.translatable_languages') as $language) {
                if (array_key_exists($translatable . "_" . $language, $request)) {
                    $i = 0;
                    while ($i < $count && !($this->translate[$i]->field == $translatable && $this->translate[$i]->lang == $language)) {
                        $i++;
                    }
                    if ($i < $count) {
                        $this->translate[$i]->text = $request[$translatable . "_" . $language];
                        $this->translate[$i]->save();
                    } else {
                        $translate = new \App\Model\Translate\Translate();
                        $translate->model_name = $this->model_name;
                        $translate->field = $translatable;
                        $translate->fid = $this->id;
                        $translate->lang = $language;
                        $translate->type = $type;
                        $translate->text = $request[$translatable . "_" . $language];
                        $translate->save();
                        $this->translate[] = $translate;
                    }
                }
            }
        }
        return true;
    }

}
