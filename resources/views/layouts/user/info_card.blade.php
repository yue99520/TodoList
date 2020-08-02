<template id="temp_user_info_card">
    <div class="ui fluid card">
        <div id="user_id" hidden></div>
        <div class="content">
            <img id="image" class="right floated mini circular ui image" src="" alt="">
            <div id="name" class="header">
            </div>
            <div id="meta" class="meta">
            </div>
            <div id="introduction" class="description">
            </div>
        </div>
        <div class="content">
            <div id="social_links" class="ui fluid mini buttons">
            </div>
        </div>
    </div>
</template>
<template id="temp_social_link">
    <a id="a_link" class="ui button" target="_blank">
        <i class="icon"></i>
    </a>
</template>
<script>
    function getTemplateUserInfoCard () {
        let html = $('#temp_user_info_card').html();
        return $(html).clone();
    }

    function getTemplateSocialLink () {
        let html = $('#temp_social_link').html();
        return $(html).clone();
    }

    function ajaxUserData (urlGetUser, id) {
        return fetch(urlGetUser + id, {
            method: "GET",
            headers: {
                'Accept': "application/json"
            }
        }).then(function (response) {
            if (response.status === 200) {
                return response.json();
            } else {
                return false;
            }
        })
    }

    function loadInfoCard (id) {
        return ajaxUserData("{{ route("home") }}/api/user/", id).then(function (json) {
            let templateUserInfoCard = getTemplateUserInfoCard();
            templateUserInfoCard.find("#user_id").text(json.id);
            templateUserInfoCard.find("#image").attr('src', json.image);
            templateUserInfoCard.find("#name").text(json.name);
            templateUserInfoCard.find("#meta").text(json.company + " " + json.department);
            templateUserInfoCard.find("#introduction").text(json.introduction);

            let socialLinks = templateUserInfoCard.find("#social_links");

            if (json.facebook !== null) {
                let templateSocialLink = loadSocialLink('facebook', json.facebook, 'FB', 'facebook');
                socialLinks.append(templateSocialLink);
            }

            if (json.instagram !== null) {
                let templateSocialLink = loadSocialLink('instagram', json.instagram, 'IG', 'instagram');
                socialLinks.append(templateSocialLink);
            }

            if (json.github !== null) {
                let templateSocialLink = loadSocialLink('black', json.github, 'GitHub', 'github');
                socialLinks.append(templateSocialLink);
            }

            if (json.twitter !== null) {
                let templateSocialLink = loadSocialLink('twitter', json.twitter, 'Twitter', 'twitter');
                socialLinks.append(templateSocialLink);
            }

            function loadSocialLink(buttonClass, href, text, icon) {
                let templateSocialLink = getTemplateSocialLink();
                templateSocialLink.addClass(buttonClass);
                templateSocialLink.attr("href", href);
                templateSocialLink.text(text);
                templateSocialLink.find("i").addClass(icon);
                return templateSocialLink;
            }

            return templateUserInfoCard[0].outerHTML;
        });
    }
</script>
