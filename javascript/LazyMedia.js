export const LazyMedia = {
    selector: '.lazycode',
    slugTpl: {
        link: '{SLUG}',
        image: '{SLUG}',
        audio: '{SLUG}',
        video: '{SLUG}',
        bandcampTrack: '//bandcamp.com/EmbeddedPlayer/track={SLUG}/size=large/artwork=none/bgcol=ffffff/linkcol=0687f5/tracklist=false/transparent=true/',
        bandcampAlbum: '//bandcamp.com/EmbeddedPlayer/album={SLUG}/size=large/artwork=none/bgcol=ffffff/linkcol=0687f5/tracklist=true/transparent=true/',
        mixcloudMix: '//mixcloud.com/widget/iframe/?feed={SLUG}&hide_cover=1',
        mixcloudPlaylist: '//mixcloud.com/widget/iframe/?feed={SLUG}&hide_cover=1',
        youtubeVideo: '//youtube.com/embed/{SLUG}?modestbranding=1&rel=0',
        youtubePlaylist: '//youtube.com/embed/videoseries?list={SLUG}&modestbranding=1&rel=0',
    },
    supportsInnerHTML: [
        'link',
    ],
    bandcampAlbumHeight: {
        header: 120,
        trackRow: 33,
        bottomBar: 50,
    },
    embed() {
        let nodes = document.querySelectorAll(this.selector);
        nodes.forEach(node => {
            if (node instanceof HTMLElement) {
                try {
                    let code = JSON.parse(node.innerHTML);
                    let e = this.bake(code, node);
                    if (e) {
                        node.replaceWith(e);
                    }
                }
                catch (error) {
                    console.error('boo\ncode:', node.innerHTML.trim(), '\n\nnode:', node, '\n\nerror message:', error);
                }
            }
        });
    },
    bake(code, targetNode) {
        let e = null;
        // LINK
        if (code.type == 'link')
            e = this.bakeLink(code);
        // IMAGE
        if (code.type == 'image')
            e = this.bakeImage(code);
        // AUDIO
        if (code.type == 'audio')
            e = this.bakeAudio(code);
        // VIDEO
        if (code.type == 'video')
            e = this.bakeVideo(code);
        // BANDCAMP
        if (code.type == 'bandcampTrack')
            e = this.bakeBandcampTrack(code);
        if (code.type == 'bandcampAlbum')
            e = this.bakeBandcampAlbum(code);
        // MIXCLOUD
        if (code.type == 'mixcloudMix')
            e = this.bakeMixcloudMix(code);
        if (code.type == 'mixcloudPlaylist')
            e = this.bakeMixcloudPlaylist(code);
        // YOUTUBE
        if (code.type == 'youtubeVideo')
            e = this.bakeYoutubeVideo(code);
        if (code.type == 'youtubePlaylist')
            e = this.bakeYoutubePlaylist(code);
        // POST-PROCESS
        if (e) {
            // remove selector css class from targetNode so we don't merge it below
            // FIXME: if it's not a class or id (which it shouldn't be) then substring(1) won't do much
            targetNode.classList.remove(this.selector.substring(1));
            // add helper css classes while keeping exiting ones from targetNode
            e.classList.add('lazymedia', code.type, ...targetNode.classList);
            // process attributes
            if (code.attr) {
                for (const [k, v] of code.attr) {
                    if (v !== false) {
                        e.setAttribute(k, v.toString());
                    }
                    else {
                        e.removeAttribute(k);
                    }
                }
            }
            // process dataset
            if (code.data) {
                for (const [k, v] of code.data) {
                    if (v !== false) {
                        e.dataset[k] = v.toString();
                    }
                    else {
                        delete e.dataset[k];
                    }
                }
            }
            // add custom innerHTML if any and type supports it
            if (code.innerHTML && this.supportsInnerHTML.indexOf(code.type) > -1) {
                e.innerHTML = code.innerHTML;
            }
        }
        return e;
    },
    bakeLink(code) {
        var _a;
        let e = document.createElement('a');
        e.setAttribute('href', this.slugTpl.link.replace('{SLUG}', code.slug.replace('&amp;', '&'))); // FIXME: how to prevent `&` being transformed to `&amp;` for the href attribute without using replace()
        e.innerHTML = this.slugTpl.link.replace('{SLUG}', ((_a = code.slug.split('//').pop()) === null || _a === void 0 ? void 0 : _a.split('/')[0]) || code.slug);
        return e;
    },
    bakeImage(code) {
        let e = document.createElement('img');
        e.setAttribute('loading', 'lazy');
        e.setAttribute('src', this.slugTpl.image.replace('{SLUG}', code.slug));
        e.setAttribute('alt', code.slug.split('/').pop() || code.slug);
        return e;
    },
    bakeAudio(code) {
        let e = document.createElement('audio');
        let e2 = document.createElement('source');
        e.setAttribute('preload', 'metadata');
        e.setAttribute('controls', 'controls');
        e2.setAttribute('src', this.slugTpl.audio.replace('{SLUG}', code.slug));
        let audioType = this.guessHTMLAudioTypeByExt(code.slug);
        if (audioType) {
            e2.setAttribute('type', audioType);
        }
        e.appendChild(e2);
        return e;
    },
    bakeVideo(code) {
        let e = document.createElement('video');
        let e2 = document.createElement('source');
        e.setAttribute('preload', 'metadata');
        e.setAttribute('controls', 'controls');
        e.setAttribute('playsinline', 'playsinline');
        e2.setAttribute('src', this.slugTpl.video.replace('{SLUG}', code.slug));
        let videoType = this.guessHTMLVideoTypeByExt(code.slug);
        if (videoType) {
            e2.setAttribute('type', videoType);
        }
        e.appendChild(e2);
        return e;
    },
    bakeBandcampTrack(code) {
        let e = document.createElement('iframe');
        e.setAttribute('loading', 'lazy');
        e.setAttribute('src', this.slugTpl.bandcampTrack.replace('{SLUG}', code.slug));
        return e;
    },
    bakeBandcampAlbum(code) {
        let e = document.createElement('iframe');
        e.setAttribute('loading', 'lazy');
        e.setAttribute('src', this.slugTpl.bandcampAlbum.replace('{SLUG}', code.slug));
        if (code.bandcampTrackCount) {
            e.style.height = `${Math.round(this.bandcampAlbumHeight.header + (this.bandcampAlbumHeight.trackRow * code.bandcampTrackCount) + this.bandcampAlbumHeight.bottomBar)}px`;
        }
        return e;
    },
    bakeMixcloudMix(code) {
        let e = document.createElement('iframe');
        e.setAttribute('loading', 'lazy');
        e.setAttribute('src', this.slugTpl.mixcloudMix.replace('{SLUG}', code.slug));
        return e;
    },
    bakeMixcloudPlaylist(code) {
        let e = document.createElement('iframe');
        e.setAttribute('loading', 'lazy');
        e.setAttribute('src', this.slugTpl.mixcloudPlaylist.replace('{SLUG}', code.slug));
        return e;
    },
    bakeYoutubeVideo(code) {
        let e = document.createElement('iframe');
        e.setAttribute('loading', 'lazy');
        e.setAttribute('src', this.slugTpl.youtubeVideo.replace('{SLUG}', code.slug));
        e.setAttribute('allowfullscreen', 'allowfullscreen'); // because allow=fullscreen is still WD
        return e;
    },
    bakeYoutubePlaylist(code) {
        let e = document.createElement('iframe');
        e.setAttribute('loading', 'lazy');
        e.setAttribute('src', this.slugTpl.youtubePlaylist.replace('{SLUG}', code.slug));
        e.setAttribute('allowfullscreen', 'allowfullscreen'); // because allow=fullscreen is still WD
        return e;
    },
    guessHTMLAudioTypeByExt(filename) {
        let audioType = null;
        let audioExt = filename.split('.').pop();
        if (audioExt == 'mp3') {
            audioType = 'audio/mpeg';
        }
        if (audioExt == 'ogg') {
            audioType = 'audio/ogg';
        }
        if (audioExt == 'wav') {
            audioType = 'audio/wav';
        }
        return audioType;
    },
    guessHTMLVideoTypeByExt(filename) {
        let videoType = null;
        let videoExt = filename.split('.').pop();
        if (videoExt == 'mp4') {
            videoType = 'video/mp4';
        }
        if (videoExt == 'webm') {
            videoType = 'video/webm';
        }
        if (videoExt == 'ogv') {
            videoType = 'video/ogg';
        }
        return videoType;
    },
    logSettings() {
        console.group('LazyMedia');
        console.log(`(${typeof (LazyMedia.selector)}) .selector:`, LazyMedia.selector);
        console.log(`.slugTpl.link (${typeof (LazyMedia.slugTpl.link)}):`, LazyMedia.slugTpl.link);
        console.log(`.slugTpl.image (${typeof (LazyMedia.slugTpl.image)}):`, LazyMedia.slugTpl.image);
        console.log(`.slugTpl.audio (${typeof (LazyMedia.slugTpl.audio)}):`, LazyMedia.slugTpl.audio);
        console.log(`.slugTpl.video (${typeof (LazyMedia.slugTpl.video)}):`, LazyMedia.slugTpl.video);
        console.log(`.slugTpl.bandcampTrack (${typeof (LazyMedia.slugTpl.bandcampTrack)}):`, LazyMedia.slugTpl.bandcampTrack);
        console.log(`.slugTpl.bandcampAlbum (${typeof (LazyMedia.slugTpl.bandcampAlbum)}):`, LazyMedia.slugTpl.bandcampAlbum);
        console.log(`.slugTpl.mixcloudMix (${typeof (LazyMedia.slugTpl.mixcloudMix)}):`, LazyMedia.slugTpl.mixcloudMix);
        console.log(`.slugTpl.mixcloudPlaylist (${typeof (LazyMedia.slugTpl.mixcloudPlaylist)}):`, LazyMedia.slugTpl.mixcloudPlaylist);
        console.log(`.slugTpl.youtubeVideo (${typeof (LazyMedia.slugTpl.youtubeVideo)}):`, LazyMedia.slugTpl.youtubeVideo);
        console.log(`.slugTpl.youtubePlaylist (${typeof (LazyMedia.slugTpl.youtubePlaylist)}):`, LazyMedia.slugTpl.youtubePlaylist);
        console.log(`.supportsInnerHTML (${typeof (LazyMedia.supportsInnerHTML)}):`, LazyMedia.supportsInnerHTML);
        console.log(`.bandcampAlbumHeight.header (${typeof (LazyMedia.bandcampAlbumHeight.header)}):`, LazyMedia.bandcampAlbumHeight.header);
        console.log(`.bandcampAlbumHeight.trackRow (${typeof (LazyMedia.bandcampAlbumHeight.trackRow)}):`, LazyMedia.bandcampAlbumHeight.trackRow);
        console.log(`.bandcampAlbumHeight.bottomBar (${typeof (LazyMedia.bandcampAlbumHeight.bottomBar)}):`, LazyMedia.bandcampAlbumHeight.bottomBar);
        console.groupEnd();
    },
};
