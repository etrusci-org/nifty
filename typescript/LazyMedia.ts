interface LazyMediaInterface {
    selector: string
    slugTpl: {
        link: string
        image: string
        audio: string
        video: string
        bandcampTrack: string
        bandcampAlbum: string
        mixcloudMix: string
        mixcloudPlaylist: string
        youtubeVideo: string
        youtubePlaylist: string
    }
    load(): void
    bakeElement(code: lazyCodeType, targetNode?: HTMLElement): HTMLElement | null
    // slug(type: string, slug: string): string
}


type lazyCodeType = {
    type: string
    slug: string
}






export const LazyMedia: LazyMediaInterface = {
    selector: '.lazycode',

    slugTpl: {
        link: '{slug}',
        image: '{slug}',
        audio: '{slug}',
        video: '{slug}',
        bandcampTrack: '//bandcamp.com/EmbeddedPlayer/track={slug}/size=large/bgcol=ffffff/linkcol=0687f5/artwork=none/transparent=true/tracklist=false/',
        bandcampAlbum: '//bandcamp.com/EmbeddedPlayer/album={slug}/size=large/bgcol=ffffff/linkcol=0687f5/artwork=none/transparent=true/',
        mixcloudMix: '//www.mixcloud.com/widget/iframe/?feed={slug}&hide_cover=1',
        mixcloudPlaylist: '//www.mixcloud.com/widget/iframe/?feed={slug}&hide_cover=1',
        youtubeVideo: '//www.youtube.com/embed/{slug}?modestbranding=1&rel=0',
        youtubePlaylist: '//www.youtube.com/embed/videoseries?list={slug}&modestbranding=1&rel=0',
    },

    load() {
        let nodes = document.querySelectorAll(this.selector)

        nodes.forEach(node => {
            if (node instanceof HTMLElement) {
                try {
                    let code: lazyCodeType = JSON.parse(node.innerHTML)
                    let e = this.bakeElement(code, node)
                    if (e) {
                        console.debug('code:', JSON.stringify(code), '\ne:', e)
                        node.replaceWith(e)
                    }
                }
                catch (error) {
                    console.error('BAD CODE:', node.innerHTML, 'IN NODE:', node, 'ERROR MESSAGE:', error)
                }
            }
        })
    },


    bakeElement(code, targetNode) {
        let e = null

        // LINK
        // FIXME: how to prevent `&` being transformed to `&amp;` for the href attribute without using replace()
        if (code.type == 'link') {
            e = document.createElement('a')

            e.setAttribute('href', this.slugTpl.link.replace('{slug}', code.slug.replace('&amp;', '&')))
            e.innerHTML = this.slugTpl.link.replace('{slug}', code.slug)
        }

        // IMAGE
        if (code.type == 'image') {
            e = document.createElement('img')

            e.setAttribute('src', this.slugTpl.image.replace('{slug}', code.slug))
        }

        // AUDIO
        if (code.type == 'audio') {
            e = document.createElement('audio')
            let e2 = document.createElement('source')

            e.setAttribute('preload', 'metadata')
            e.setAttribute('controls', 'controls')

            e2.setAttribute('src', this.slugTpl.audio.replace('{slug}', code.slug))
            let audioType = getAudioTypeByExt(code.slug)
            if (audioType) {
                e2.setAttribute('type', audioType)
            }

            e.appendChild(e2)
        }

        // VIDEO
        if (code.type == 'video') {
            e = document.createElement('video')
            let e2 = document.createElement('source')

            e.setAttribute('preload', 'metadata')
            e.setAttribute('controls', 'controls')

            e2.setAttribute('src', this.slugTpl.video.replace('{slug}', code.slug))
            let videoType = getVideoTypeByExt(code.slug)
            if (videoType) {
                e2.setAttribute('type', videoType)
            }

            e.appendChild(e2)
        }

        // BANDCAMP
        if (code.type == 'bandcampTrack') {
            e = document.createElement('iframe')

            e.setAttribute('src', this.slugTpl.bandcampTrack.replace('{slug}', code.slug))
        }

        if (code.type == 'bandcampAlbum') {
            e = document.createElement('iframe')

            e.setAttribute('src', this.slugTpl.bandcampAlbum.replace('{slug}', code.slug))
        }

        // MIXCLOUD
        if (code.type == 'mixcloudMix') {
            e = document.createElement('iframe')

            e.setAttribute('src', this.slugTpl.mixcloudMix.replace('{slug}', code.slug))
        }

        if (code.type == 'mixcloudPlaylist') {
            e = document.createElement('iframe')

            e.setAttribute('src', this.slugTpl.mixcloudPlaylist.replace('{slug}', code.slug))
        }

        // YOUTUBE
        if (code.type == 'youtubeVideo') {
            e = document.createElement('iframe')

            e.setAttribute('src', this.slugTpl.youtubeVideo.replace('{slug}', code.slug))
        }

        if (code.type == 'youtubePlaylist') {
            e = document.createElement('iframe')

            e.setAttribute('src', this.slugTpl.youtubePlaylist.replace('{slug}', code.slug))
        }

        // POST-PROCESS if target node is given
        if (e && targetNode) {
            // remove selector css class from targetNode
            targetNode.classList.remove(this.selector.substring(1))

            // add helper css classes but keep those from targetNode
            e.classList.add('lazymedia', code.type, ...targetNode.classList)

            // keep targetNode style
            let style = targetNode.getAttribute('style')
            if (style) {
                e.setAttribute('style', style)
            }
        }

        return e
    },
}














function getAudioTypeByExt(filename: string): string | null {
    let audioType = null
    let audioExt = filename.split('.').pop()

    if (audioExt == 'mp3') {
        audioType = 'audio/mpeg'
    }

    if (audioExt == 'ogg') {
        audioType = 'audio/ogg'
    }

    if (audioExt == 'wav') {
        audioType = 'audio/wav'
    }

    return audioType
}


function getVideoTypeByExt(filename: string): string | null {
    let videoType = null
    let videoExt = filename.split('.').pop()

    if (videoExt == 'mp4') {
        videoType = 'video/mp4'
    }

    if (videoExt == 'webm') {
        videoType = 'video/webm'
    }

    if (videoExt == 'ogv') {
        videoType = 'video/ogg'
    }

    return videoType
}
