!
function(t) {
    function e(r) {
        if (n[r]) return n[r].exports;
        var i = n[r] = {
            exports: {},
            id: r,
            loaded: !1
        };
        return t[r].call(i.exports, i, i.exports, e),
        i.loaded = !0,
        i.exports
    }
    var n = {};
    return e.m = t,
    e.c = n,
    e.p = "",
    e(0)
} ([function(t, e, n) {
    "use strict";
    function r(t) {
        return t && t.__esModule ? t: {
        default:
            t
        }
    }
    var i = n(6),
    o = (r(i), n(10)),
    a = r(o),
    s = n(11),
    c = r(s),
    u = n(12),
    l = r(u),
    f = n(13),
    d = r(f),
    p = n(14),
    h = r(p),
    v = n(215),
    m = r(v),
    g = n(225),
    y = r(g),
    b = n(111),
    w = r(b),
    _ = n(187),
    x = r(_),
    k = n(92),
    C = r(k),
    E = n(22),
    S = r(E),
    T = n(226),
    P = r(T);
    window.Promise = n(227),
    c.
default.use(d.
default),
    c.
default.filter("dateFormatter", S.
default.format),
    c.
default.http.options.root = y.
default.apiHost,
    c.
default.http.options.emulateJSON = !0,
    c.
default.config.devtools = !0;
    var A = new l.

    A.beforeEach(function(t, e, n) {
        ga && ga("send", "pageview", t.name),
        C.
    default.state.isActive() || "searchResult" !== t.name && "home" !== t.name || (0, a.
    default)({
            message:
            "您是未激活用户, 最多可显示5条搜索结果",
            position: "bottom",
            duration: 6e3
        }),
        n()
    });
    var M = x.
default.get("seriesnum") || localStorage.getItem("seriesnum");
    w.
default.post("info", {
        seriesNum: M
    }).then(function(t) {
        window.globalInfo = t,
        ga && (t.active ? ga("send", "event", {
            eventCategory: "visit",
            eventAction: "active-visit",
            eventLabel: M
        }) : (x.
    default.remove("seriesnum"), localStorage.removeItem("seriesnum"), ga("send", "event", {
            eventCategory: "visit",
            eventAction: "deactive-visit"
        }))),
        setTimeout(function() {
            new c.
        default({
                el:
                "#app",
                render: function(t) {
                    return t(m.
                default)
                },
                router: A
            })
        },
        0);
        var e = window.navigator.userAgent.match(/chrome\/([\d.]+)/i);
        e && e.length > 1 && P.
    default.versionCompare(e[1], "29") < 0 && alert("您的浏览器版本过低,请升级!")
    },
    function(t) {
        alert(t),
        console.error(t)
    })
},
, , , , ,
function(t, e) {},
,
function(t, e) {
    t.exports = function() {
        var t = [];
        return t.toString = function() {
            for (var t = [], e = 0; e < this.length; e++) {
                var n = this[e];
                n[2] ? t.push("@media " + n[2] + "{" + n[1] + "}") : t.push(n[1])
            }
            return t.join("")
        },
        t.i = function(e, n) {
            "string" == typeof e && (e = [[null, e, ""]]);
            for (var r = {},
            i = 0; i < this.length; i++) {
                var o = this[i][0];
                "number" == typeof o && (r[o] = !0)
            }
            for (i = 0; i < e.length; i++) {
                var a = e[i];
                "number" == typeof a[0] && r[a[0]] || (n && !a[2] ? a[2] = n: n && (a[2] = "(" + a[2] + ") and (" + n + ")"), t.push(a))
            }
        },
        t
    }
},
,
function(t, e, n) {
    t.exports = function(t) {
        function e(r) {
            if (n[r]) return n[r].exports;
            var i = n[r] = {
                i: r,
                l: !1,
                exports: {}
            };
            return t[r].call(i.exports, i, i.exports, e),
            i.l = !0,
            i.exports
        }
        var n = {};
        return e.m = t,
        e.c = n,
        e.i = function(t) {
            return t
        },
        e.d = function(t, n, r) {
            e.o(t, n) || Object.defineProperty(t, n, {
                configurable: !1,
                enumerable: !0,
                get: r
            })
        },
        e.n = function(t) {
            var n = t && t.__esModule ?
            function() {
                return t.
            default
            }:
            function() {
                return t
            };
            return e.d(n, "a", n),
            n
        },
        e.o = function(t, e) {
            return Object.prototype.hasOwnProperty.call(t, e)
        },
        e.p = "",
        e(e.s = 241)
    } ({
        0 : function(t, e) {
            t.exports = n(11)
        },
        110 : function(t, e) {},
        163 : function(t, e, n) {
            var r, i;
            n(110),
            r = n(85);
            var o = n(178);
            i = r = r || {},
            "object" != typeof r.
        default && "function" != typeof r.
        default || (i = r = r.
        default),
            "function" == typeof i && (i = i.options),
            i.render = o.render,
            i.staticRenderFns = o.staticRenderFns,
            t.exports = r
        },
        178 : function(t, e) {
            t.exports = {
                render: function() {
                    var t = this,
                    e = t.$createElement,
                    n = t._self._c || e;
                    return n("transition", {
                        attrs: {
                            name: "mint-toast-pop"
                        }
                    },
                    [n("div", {
                        directives: [{
                            name: "show",
                            rawName: "v-show",
                            value: t.visible,
                            expression: "visible"
                        }],
                        staticClass: "mint-toast",
                        class: t.customClass,
                        style: {
                            padding: "" === t.iconClass ? "10px": "20px"
                        }
                    },
                    ["" !== t.iconClass ? n("i", {
                        staticClass: "mint-toast-icon",
                        class: t.iconClass
                    }) : t._e(), t._v(" "), n("span", {
                        staticClass: "mint-toast-text",
                        style: {
                            "padding-top": "" === t.iconClass ? "0": "10px"
                        }
                    },
                    [t._v(t._s(t.message))])])])
                },
                staticRenderFns: []
            }
        },
        241 : function(t, e, n) {
            t.exports = n(49)
        },
        49 : function(t, e, n) {
            "use strict";
            var r = n(93);
            Object.defineProperty(e, "__esModule", {
                value: !0
            }),
            n.d(e, "default",
            function() {
                return r.a
            })
        },
        85 : function(t, e, n) {
            "use strict";
            Object.defineProperty(e, "__esModule", {
                value: !0
            }),
            e.
        default = {
                props: {
                    message: String,
                    className: {
                        type: String,
                    default:
                        ""
                    },
                    position: {
                        type: String,
                    default:
                        "middle"
                    },
                    iconClass: {
                        type: String,
                    default:
                        ""
                    }
                },
                data: function() {
                    return {
                        visible: !1
                    }
                },
                computed: {
                    customClass: function() {
                        var t = [];
                        switch (this.position) {
                        case "top":
                            t.push("is-placetop");
                            break;
                        case "bottom":
                            t.push("is-placebottom");
                            break;
                        default:
                            t.push("is-placemiddle")
                        }
                        return t.push(this.className),
                        t.join(" ")
                    }
                }
            }
        },
        93 : function(t, e, n) {
            "use strict";
            var r = n(0),
            i = n.n(r),
            o = i.a.extend(n(163)),
            a = [],
            s = function() {
                if (a.length > 0) {
                    var t = a[0];
                    return a.splice(0, 1),
                    t
                }
                return new o({
                    el: document.createElement("div")
                })
            },
            c = function(t) {
                t && a.push(t)
            },
            u = function(t) {
                t.target.parentNode && t.target.parentNode.removeChild(t.target)
            };
            o.prototype.close = function() {
                this.visible = !1,
                this.$el.addEventListener("transitionend", u),
                this.closed = !0,
                c(this)
            };
            var l = function(t) {
                void 0 === t && (t = {});
                var e = t.duration || 3e3,
                n = s();
                return n.closed = !1,
                clearTimeout(n.timer),
                n.message = "string" == typeof t ? t: t.message,
                n.position = t.position || "middle",
                n.className = t.className || "",
                n.iconClass = t.iconClass || "",
                document.body.appendChild(n.$el),
                i.a.nextTick(function() {
                    n.visible = !0,
                    n.$el.removeEventListener("transitionend", u),
                    ~e && (n.timer = setTimeout(function() {
                        n.closed || n.close()
                    },
                    e))
                }),
                n
            };
            e.a = l
        }
    })
},
function(t, e) {
    t.exports = Vue
},
function(t, e) {
    t.exports = VueRouter
},
function(t, e) {
    t.exports = VueResource
},
function(t, e, n) {
    "use strict";
    function r(t) {
        return t && t.__esModule ? t: {
        default:
            t
        }
    }
    Object.defineProperty(e, "__esModule", {
        value: !0
    });
    var i = n(15),
    o = r(i),
    a = n(88),
    s = r(a),
    c = n(95),
    u = r(c);
    e.
default = [{
        path: "/home",
        name: "home",
        component: o.
    default
    },
    {
        path: "/search",
        component: s.
    default,
        children: u.
    default
    },
    {
        path: "/*",
        redirect: "/home"
    }]
},
function(t, e, n) {
    n(16);
    var r = n(20)(n(21), n(85), null, null);
    t.exports = r.exports
},
function(t, e, n) {
    var r = n(17);
    "string" == typeof r && (r = [[t.id, r, ""]]),
    r.locals && (t.exports = r.locals);
    n(18)("20820489", r, !0)
},
function(t, e, n) {
    e = t.exports = n(8)(),
    e.push([t.id, '.home{min-height:500px;overflow:hidden;width:100%;height:100%;position:absolute;left:0;top:0}.home .header{padding:0 20px;height:50px;box-shadow:0 0 15px rgba(84,82,82,.76)}.home .header a{transition:all .3s ease;color:#fff}.home .header a:active,.home .header a:hover{transform:scale(1.2);color:#fff}.home .header li{transition:all .3s ease;display:inline-block;line-height:50px;height:50px;padding:0 10px}.home .header li.other:active,.home .header li.other:hover{background-color:rgba(63,185,215,.71)}.home .header li.other{cursor:pointer}.home .header ul{padding-left:0;text-align:left;margin:0;list-style:none;color:#fff;word-break:keep-all}.home .header ul.ohters-container{overflow:hidden;max-width:600px}.home .background{z-index:1;background:transparent 50%/cover no-repeat;filter:blur(5px);transform:scale(1.03)}.home .background,.home .overlay{width:100%;height:100%;position:absolute;left:0;top:0}.home .overlay{z-index:2;background-color:rgba(0,0,0,.25)}.home .main{color:#fff;z-index:10;width:100%;height:100%;position:absolute;left:0;top:0;background-size:cover;line-height:1.7em;text-align:center;position:relative}.home .main .message{position:absolute;z-index:1000;background-color:rgba(0,0,0,.4);width:100%;max-width:400px;left:50%;bottom:0;transform:translateX(-50%)}.home .main .message a{color:#fff}.home .main .home-container{padding-top:5%;width:100%}.home .main .logo{padding-top:10px;margin-bottom:100px;position:relative}.home .main .logo .img-container{width:100px;height:100px;margin:0 auto;position:relative}@media screen and (max-width:650px){.home .main .logo .img-container{width:80px}}.home .main .logo .img-container img{width:100%;display:block}.home .main .logo .img-container img.round{width:104px;top:-2px;left:-2px;position:absolute;z-index:10;animation:round 3s linear infinite}@media screen and (max-width:650px){.home .main .logo .img-container img.round{width:84px}}.home .main .logo:after{content:"\u9b54\u529b\u641c\u7d22";position:absolute;bottom:-32px;font-size:20px;left:50%;transform:translateX(-50%)}@media screen and (max-width:650px){.home .main .logo:after{bottom:-10px}}.home .main .prompt{font-size:337.5%;letter-spacing:0;overflow:hidden;position:relative}.home .main .prompt .input-container{position:relative;display:inline-block;width:auto;margin:0 auto;max-width:90%}.home .main .prompt .input-container .go-forward{position:absolute;bottom:10px;right:20px;font-size:38px;cursor:pointer}.home .main .prompt .input-container .go-forward:hover{color:#d7371c}.home .main .prompt .question{line-height:120%;white-space:normal}.home .main .prompt .keyword-input{-webkit-appearance:none;padding-top:15px;width:auto;display:block;background:0;border:0;border-bottom:3px solid #fff;color:#fff;font-weight:500;outline:0;text-align:center;font-size:100%;max-width:100%;border-radius:0}.home .main .prompt .tip{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;margin:20px auto 0;width:auto;max-width:600px}.home .main .prompt .tip .tip-item{cursor:pointer;font-size:25px;line-height:40px}.home .main .prompt .tip .tip-item a{display:inline-block;width:100%;height:100%;color:#fff;transition:all .3s ease}.home .main .prompt .tip .tip-item a:active,.home .main .prompt .tip .tip-item a:hover{background-color:rgba(63,185,215,.71);transform:scale(1.1)}@media screen and (max-width:650px){.home .main .prompt .tip .tip-item{font-size:16px;line-height:25px}}@media screen and (max-width:650px){.home .main .prompt{font-size:200%}.home .main .prompt .input-container{max-width:80%}}@keyframes round{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}', ""])
},
function(t, e, n) {
    function r(t) {
        for (var e = 0; e < t.length; e++) {
            var n = t[e],
            r = l[n.id];
            if (r) {
                r.refs++;
                for (var i = 0; i < r.parts.length; i++) r.parts[i](n.parts[i]);
                for (; i < n.parts.length; i++) r.parts.push(o(n.parts[i]));
                r.parts.length > n.parts.length && (r.parts.length = n.parts.length)
            } else {
                for (var a = [], i = 0; i < n.parts.length; i++) a.push(o(n.parts[i]));
                l[n.id] = {
                    id: n.id,
                    refs: 1,
                    parts: a
                }
            }
        }
    }
    function i() {
        var t = document.createElement("style");
        return t.type = "text/css",
        f.appendChild(t),
        t
    }
    function o(t) {
        var e, n, r = document.querySelector('style[data-vue-ssr-id~="' + t.id + '"]');
        if (r) {
            if (h) return v;
            r.parentNode.removeChild(r)
        }
        if (m) {
            var o = p++;
            r = d || (d = i()),
            e = a.bind(null, r, o, !1),
            n = a.bind(null, r, o, !0)
        } else r = i(),
        e = s.bind(null, r),
        n = function() {
            r.parentNode.removeChild(r)
        };
        return e(t),
        function(r) {
            if (r) {
                if (r.css === t.css && r.media === t.media && r.sourceMap === t.sourceMap) return;
                e(t = r)
            } else n()
        }
    }
    function a(t, e, n, r) {
        var i = n ? "": r.css;
        if (t.styleSheet) t.styleSheet.cssText = g(e, i);
        else {
            var o = document.createTextNode(i),
            a = t.childNodes;
            a[e] && t.removeChild(a[e]),
            a.length ? t.insertBefore(o, a[e]) : t.appendChild(o)
        }
    }
    function s(t, e) {
        var n = e.css,
        r = e.media,
        i = e.sourceMap;
        if (r && t.setAttribute("media", r), i && (n += "\n/*# sourceURL=" + i.sources[0] + " */", n += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(i)))) + " */"), t.styleSheet) t.styleSheet.cssText = n;
        else {
            for (; t.firstChild;) t.removeChild(t.firstChild);
            t.appendChild(document.createTextNode(n))
        }
    }
    var c = "undefined" != typeof document,
    u = n(19),
    l = {},
    f = c && (document.head || document.getElementsByTagName("head")[0]),
    d = null,
    p = 0,
    h = !1,
    v = function() {},
    m = "undefined" != typeof navigator && /msie [6-9]\b/.test(navigator.userAgent.toLowerCase());
    t.exports = function(t, e, n) {
        h = n;
        var i = u(t, e);
        return r(i),
        function(e) {
            for (var n = [], o = 0; o < i.length; o++) {
                var a = i[o],
                s = l[a.id];
                s.refs--,
                n.push(s)
            }
            e ? (i = u(t, e), r(i)) : i = [];
            for (var o = 0; o < n.length; o++) {
                var s = n[o];
                if (0 === s.refs) {
                    for (var c = 0; c < s.parts.length; c++) s.parts[c]();
                    delete l[s.id]
                }
            }
        }
    };
    var g = function() {
        var t = [];
        return function(e, n) {
            return t[e] = n,
            t.filter(Boolean).join("\n")
        }
    } ()
},
function(t, e) {
    t.exports = function(t, e) {
        for (var n = [], r = {},
        i = 0; i < e.length; i++) {
            var o = e[i],
            a = o[0],
            s = o[1],
            c = o[2],
            u = o[3],
            l = {
                id: t + ":" + i,
                css: s,
                media: c,
                sourceMap: u
            };
            r[a] ? r[a].parts.push(l) : n.push(r[a] = {
                id: a,
                parts: [l]
            })
        }
        return n
    }
},



]);