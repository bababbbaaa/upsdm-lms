<div class=" mt-3">
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="/admin/settings/main" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="name" value="home_hero">
                <input type="hidden" name="page" value="personalization">

                <?php if(!empty(getGeneralSettings('content_translate'))): ?>
                    <div class="form-group">
                        <label class="input-label"><?php echo e(trans('auth.language')); ?></label>
                        <select name="locale" class="form-control js-edit-content-locale">
                            <?php $__currentLoopData = $userLanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang); ?>" <?php if(mb_strtolower(request()->get('locale', (!empty($itemValue) and !empty($itemValue['locale'])) ? $itemValue['locale'] : app()->getLocale())) == mb_strtolower($lang)): ?> selected <?php endif; ?>><?php echo e($language); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['locale'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="locale" value="<?php echo e(getDefaultLocale()); ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label><?php echo e(trans('admin/main.title')); ?></label>
                    <input type="text" name="value[title]" value="<?php echo e((!empty($itemValue) and !empty($itemValue['title'])) ? $itemValue['title'] : old('title')); ?>" class="form-control " required/>
                </div>

                <div class="form-group">
                    <label><?php echo e(trans('public.description')); ?></label>
                    <textarea type="text" name="value[description]" rows="5" class="form-control " required><?php echo e((!empty($itemValue) and !empty($itemValue['description'])) ? $itemValue['description'] : old('description')); ?></textarea>
                </div>

                <div class="form-group">
                    <label class="input-label"><?php echo e(trans('admin/main.hero_background')); ?></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="hero_background" data-preview="holder">
                                <i class="fa fa-chevron-up"></i>
                            </button>
                        </div>
                        <input type="text" name="value[hero_background]" id="hero_background" required value="<?php echo e((!empty($itemValue) and !empty($itemValue['hero_background'])) ? $itemValue['hero_background'] : old('hero_background')); ?>" class="form-control"/>
                    </div>
                </div>

                <div class="form-group custom-switches-stacked">
                    <label class="custom-switch pl-0">
                        <input type="hidden" name="value[is_video_background]" value="0">
                        <input type="checkbox" name="value[is_video_background]" id="isVideoBackground" value="1" <?php echo e((!empty($itemValue) and !empty($itemValue['is_video_background']) and $itemValue['is_video_background']) ? 'checked="checked"' : ''); ?> class="custom-switch-input"/>
                        <span class="custom-switch-indicator"></span>
                        <label class="custom-switch-description mb-0 cursor-pointer" for="isVideoBackground"><?php echo e(trans('update.is_video_background')); ?></label>
                    </label>
                    <div class="text-muted text-small mt-1"><?php echo e(trans('update.is_video_background_hint')); ?></div>

                </div>

                <button type="submit" class="btn btn-success"><?php echo e(trans('admin/main.save_change')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\fresh-lms\resources\views/admin/settings/personalization/home_hero.blade.php ENDPATH**/ ?>