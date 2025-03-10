<?php defined('CORE_FOLDER') OR exit('You can not get in here!');
    $settings       = isset($theme["config"]["settings"]) ? $theme["config"]["settings"] : [];
    $lkey           = "en";
    if(isset($theme["locale"][Bootstrap::$lang->clang])) $lkey = Bootstrap::$lang->clang;
    $language       = isset($theme["locale"][$lkey]) ? $theme["locale"][$lkey] : [];
    
    if(isset($theme["config"]["header-types"]) && $theme["config"]["header-types"]){
        ?>
        <div class="formcon">
            <div class="yuzde30"><?php echo __("admin/settings/theme-header-type"); ?></div>
            <div class="yuzde70">

                <script type="text/javascript">
                    function Modern_change_header_type(elem){
                        var value   =  $(elem).val();
                        var checked = $(elem).prop("checked");
                        $(".header-type-active").css("display","none");
                        if(checked) $("#Modern_header_"+value+"_active").css("display","block");
                        $(".header-type-label img").removeAttr("id");
                        $("img",$(elem).next()).attr("id","activetimage");
                    }
                </script>

                <?php
                    foreach($theme["config"]["header-types"] AS $k=>$v){
                        $active = $settings["header-type"]==$k;
                        ?>
                        <input type="radio" class="radio-custom" name="header_type" value="<?php echo $k; ?>" id="Modern_header_<?php echo $k; ?>"<?php echo $active ? ' checked' : NULL; ?>>
                        <label class="radio-custom-label" style="margin-right: 10px;" for="Modern_header_<?php echo $k; ?>">
                            <?php echo $v["name"]; ?>
                        </label>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }

    if(isset($theme["config"]["clientArea-types"]) && $theme["config"]["clientArea-types"]){
        ?>
        <div class="formcon" id="Modern_clientArea_Type_wrap">
            <div class="yuzde30"><?php echo __("admin/settings/clientArea-type"); ?></div>
            <div class="yuzde70">
                <?php
                    foreach($theme["config"]["clientArea-types"] AS $k=>$v){
                        $active = $settings["clientArea-type"]==$k;
                        ?>
                        <input style="<?php #echo $k == 2 ? 'display:none' :  ''; ?>" type="radio" class="radio-custom" name="clientArea_type" value="<?php echo $k; ?>" id="Modern_clientArea_<?php echo $k; ?>"<?php echo $active ? ' checked' : NULL; ?>>
                        <label style="margin-right: 10px;<?php #echo $k == 2 ? 'display:none' :  ''; ?>" class="radio-custom-label" for="Modern_clientArea_<?php echo $k; ?>">
                            <?php echo $v["name"]; ?>
                        </label>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }
?>

<div class="formcon">
    <div class="yuzde30"><?php echo $language["settings-new-login-area"]; ?></div>
    <div class="yuzde70">

        <input<?php echo isset($settings["new-login-area"]) && $settings["new-login-area"] ? ' checked' : ''; ?> type="checkbox" name="new-login-area" value="1" class="checkbox-custom" id="new-login-area">
        <label for="new-login-area" class="checkbox-custom-label"></label>
    </div>
</div>

<div class="formcon">
    <div class="yuzde30"><?php echo __("admin/settings/theme-colors"); ?></div>
    <div class="yuzde70">
        <div id="colorSelector">
            <div style="background-color: #0000ff"></div></div>

        <div class="jscolorpicker">

            <script type="text/javascript">
                function use_dominant_colors()
                {
                    const colors = get_image_dominant_colors("header_logo_preview");
                    if(colors[0] !== undefined)
                        $("input[name=color1]").spectrum("set",colors[0]);
                    if(colors[1] !== undefined)
                        $("input[name=color2]").spectrum("set",colors[1]);
                }
            </script>

            <a class="lbtn" href="javascript:use_dominant_colors();"><i class="fas fa-palette"></i> <?php echo $language["use-dominant-colors"] ?? "Use Logo Dominant Colors"; ?></a>

            <div class="clear"></div>

            <div class="formcon"> <span><?php echo __("admin/settings/main-color1"); ?></span>
                <input name="color1" class="jscolor" value="<?php echo $settings["color1"]; ?>">
            </div>

            <div class="clear"></div>

            <div class="formcon"><span><?php echo __("admin/settings/main-color2"); ?></span>
                <input name="color2" class="jscolor" value="<?php echo $settings["color2"]; ?>">
            </div>

            <div class="clear"></div>

            <div class="formcon"><span><?php echo __("admin/settings/text-color"); ?></span>
                <input name="text_color" class="jscolor" value="<?php echo $settings["text-color"]; ?>">
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>