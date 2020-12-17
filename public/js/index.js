(function(t) {
    function e(e) {
        for (var r, a, u = e[0], c = e[1], l = e[2], p = 0, f = []; p < u.length; p++) a = u[p], Object.prototype.hasOwnProperty.call(i, a) && i[a] && f.push(i[a][0]), i[a] = 0;
        for (r in c) Object.prototype.hasOwnProperty.call(c, r) && (t[r] = c[r]);
        s && s(e);
        while (f.length) f.shift()();
        return o.push.apply(o, l || []), n()
    }

    function n() {
        for (var t, e = 0; e < o.length; e++) {
            for (var n = o[e], r = !0, u = 1; u < n.length; u++) {
                var c = n[u];
                0 !== i[c] && (r = !1)
            }
            r && (o.splice(e--, 1), t = a(a.s = n[0]))
        }
        return t
    }
    var r = {},
        i = {
            app: 0
        },
        o = [];

    function a(e) {
        if (r[e]) return r[e].exports;
        var n = r[e] = {
            i: e,
            l: !1,
            exports: {}
        };
        return t[e].call(n.exports, n, n.exports, a), n.l = !0, n.exports
    }
    a.m = t, a.c = r, a.d = function(t, e, n) {
        a.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: n
        })
    }, a.r = function(t) {
        "undefined" !== typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        })
    }, a.t = function(t, e) {
        if (1 & e && (t = a(t)), 8 & e) return t;
        if (4 & e && "object" === typeof t && t && t.__esModule) return t;
        var n = Object.create(null);
        if (a.r(n), Object.defineProperty(n, "default", {
            enumerable: !0,
            value: t
        }), 2 & e && "string" != typeof t)
            for (var r in t) a.d(n, r, function(e) {
                return t[e]
            }.bind(null, r));
        return n
    }, a.n = function(t) {
        var e = t && t.__esModule ? function() {
            return t["default"]
        } : function() {
            return t
        };
        return a.d(e, "a", e), e
    }, a.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, a.p = "/";
    var u = window["webpackJsonp"] = window["webpackJsonp"] || [],
        c = u.push.bind(u);
    u.push = e, u = u.slice();
    for (var l = 0; l < u.length; l++) e(u[l]);
    var s = c;
    o.push([0, "chunk-vendors"]), n()
})({
    0: function(t, e, n) {
        t.exports = n("56d7")
    },
    "034f": function(t, e, n) {
        "use strict";
        n("85ec")
    },
    1: function(t, e) {},
    "56d7": function(t, e, n) {
        "use strict";
        n.r(e);
        n("4de4"), n("e260"), n("e6cf"), n("cca6"), n("a79d");
        var r = n("2b0e"),
            i = function() {
                var t = this,
                    e = t.$createElement,
                    n = t._self._c || e;
                return n("div", {
                    attrs: {
                        id: "app"
                    }
                }, [n("ApplicationForm")], 1)
            },
            o = [],
            a = function() {
                var t = this,
                    e = t.$createElement,
                    n = t._self._c || e;
                return n("div", {
                    staticClass: "application"
                }, [n("h1", [t._v("Total Application Amount")]), n("form", {
                    attrs: {
                        action: "#"
                    },
                    on: {
                        submit: t.checkApplicationAmount
                    }
                }, [n("div", {
                    staticClass: "columns is-mobile is-centered"
                }, [n("div", {
                    staticClass: "column is-half"
                }, [n("div", {
                    staticClass: "field is-grouped"
                }, [n("p", {
                    staticClass: "control is-expanded"
                }, [n("input", {
                    directives: [{
                        name: "model",
                        rawName: "v-model.number",
                        value: t.quantity,
                        expression: "quantity",
                        modifiers: {
                            number: !0
                        }
                    }],
                    staticClass: "input",
                    attrs: {
                        type: "number",
                        name: "quantity",
                        placeholder: "Enter the quantity"
                    },
                    domProps: {
                        value: t.quantity
                    },
                    on: {
                        input: function(e) {
                            e.target.composing || (t.quantity = t._n(e.target.value))
                        },
                        blur: function(e) {
                            return t.$forceUpdate()
                        }
                    }
                })]), t._m(0)]), t.error ? n("p", {
                    staticClass: "help is-danger"
                }, [t._v(t._s(t.error))]) : t._e(), t.totalPrice ? n("p", {
                    staticClass: "help is-info"
                }, [t._v("The total price for the application is " + t._s(t._f("toCurrency")(this.totalPrice)))]) : t._e()])])])])
            },
            u = [function() {
                var t = this,
                    e = t.$createElement,
                    n = t._self._c || e;
                return n("p", {
                    staticClass: "control"
                }, [n("button", {
                    staticClass: "button is-info",
                    attrs: {
                        type: "submit"
                    }
                }, [t._v("Submit")])])
            }],
            c = {
                name: "HelloWorld",
                data: function() {
                    return {
                        quantity: null,
                        totalPrice: null,
                        error: null
                    }
                },
                methods: {
                    clear: function() {
                        this.quantity = null, this.totalPrice = null, this.error = null
                    },
                    checkApplicationAmount: function() {
                        var t = this;
                        this.error = null;
                        var e = {
                            quantity: this.quantity
                        };
                        this.clear(), this.$http.post("http://localhost/api/inventory", e).then((function(e) {
                            t.totalPrice = e.body.applicationTotalPrice
                        }), (function(e) {
                            t.error = e.body.quantity[0]
                        }))
                    }
                }
            },
            l = c,
            s = (n("d791"), n("2877")),
            p = Object(s["a"])(l, a, u, !1, null, "1bd6e85c", null),
            f = p.exports,
            d = {
                name: "App",
                components: {
                    ApplicationForm: f
                }
            },
            m = d,
            h = (n("034f"), Object(s["a"])(m, i, o, !1, null, null, null)),
            y = h.exports,
            b = n("28dd");
        r["a"].use(b["a"]), r["a"].config.productionTip = !1, r["a"].filter("toCurrency", (function(t) {
            if ("number" !== typeof t) return t;
            var e = new Intl.NumberFormat("en-NZ", {
                style: "currency",
                currency: "NZD",
                minimumFractionDigits: 2
            });
            return e.format(t)
        })), new r["a"]({
            render: function(t) {
                return t(y)
            }
        }).$mount("#app")
    },
    "85ec": function(t, e, n) {},
    baa6: function(t, e, n) {},
    d791: function(t, e, n) {
        "use strict";
        n("baa6")
    }
});
//# sourceMappingURL=app.3de5b634.js.map
