// function userHistoryTable(n, t, i) {
//     var r = this,
//         f, u, e;
//     r.marketName = i.marketName;
//     r.nounce = ko.observable(0);
//     r.closedOrders = ko.observableArray([]);
//     r.options = t;
//     var o = function(n) {
//             var t, i;
//             if (n.serviceData)
//                 if (t = n.serviceData, r.nounce() + 1 < t.Nounce) u();
//                 else if (r.nounce() + 1 == t.Nounce) {
//                 if (r.marketName && r.marketName != t.Order.Exchange) return;
//                 switch (t.Type) {
//                     case 2:
//                         i = new closedOrderEntry(t.Order);
//                         r.closedOrders.push(i)
//                 }
//                 r.nounce(t.Nounce)
//             }
//         },
//         s = function(n) {
//             if (n.serviceData) {
//                 var t = n.serviceData,
//                     i = $.map(t, function(n) {
//                         return new closedOrderEntry(n)
//                     });
//                 r.closedOrders(i)
//             }
//         },
//         h = function(n) {
//             if (n.serviceData) {
//                 var t = n.serviceData;
//                 t && r.nounce(t.Nounce)
//             }
//         };
//     $("#event-store").on("data-update-orders", o);
//     $("#event-store").on("data-query-closedOrders", s);
//     $("#event-store").on("data-query-orders", h);
//     u = function() {
//         $("#event-store").trigger({
//             type: "request-query-orders"
//         })
//     };
//     r.resize = function(n) {
//         f.historyDataTable("resize", n)
//     };
//     r.getClosedOrders = function() {
//         u()
//     };
//     r.getAllClosedOrders = function() {
//         r.showModal()
//     };
//     r.showAllButton = ko.observable(!0);
//     f = $("#" + n).historyDataTable({
//         dataSource: r.closedOrders,
//         customToolbar: t.customToolbar
//     });
//     r.displayHistoryModal = ko.observable(!1);
//     r.cancelHistoryModal = function() {
//         r.displayHistoryModal(!1)
//     };
//     r.showModal = function() {
//         r.resetHistoryModal();
//         r.displayHistoryModal(!0)
//     };
//     r.resetHistoryModal = function() {};
//     r.submitHistoryModal = function() {
//         e()
//     };
//     e = function() {
//         var i = $("#captchaForm"),
//             t = i.serialize(),
//             u = $("input[name^=__RequestVerificationToken]").first().serialize(),
//             n;
//         t += "&marketName=" + r.marketName;
//         n = new XMLHttpRequest;
//         n.open("POST", "/api/v2.0/auth/market/DownloadMarketOrderHistory", !0);
//         n.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         n.responseType = "arraybuffer";
//         n.onload = function() {
//             var i, u, s, f, h, e, o, r, t;
//             this.status === 200 && (i = "", u = n.getResponseHeader("Content-Disposition"), u && u.indexOf("attachment") !== -1 && (s = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/, f = s.exec(u), f != null && f[1] && (i = f[1].replace(/['"]/g, ""))), h = n.getResponseHeader("Content-Type"), e = new Blob([this.response], {
//                 type: h
//             }), typeof window.navigator.msSaveBlob != "undefined" ? window.navigator.msSaveBlob(e, i) : (o = window.URL || window.webkitURL, r = o.createObjectURL(e), i ? (t = document.createElement("a"), typeof t.download == "undefined" ? window.location = r : (t.href = r, t.download = i, document.body.appendChild(t), t.click())) : window.location = r, setTimeout(function() {
//                 o.revokeObjectURL(r)
//             }, 100)))
//         };
//         n.send(t + "&" + u)
//     };
//     r.getClosedOrders()
// }

// function userOpenOrdersTable(n, t, i) {
//     "use strict";
//     var r = this,
//         f, e, o, u;
//     r.marketName = i.marketName;
//     r.nounce = ko.observable(0);
//     r.openOrders = ko.observableArray([]);
//     r.options = t;
//     e = function(n) {
//         var i, e, f, t;
//         if (n.serviceData)
//             if (i = n.serviceData, r.nounce() + 1 < i.Nounce) u();
//             else if (r.nounce() + 1 == i.Nounce) {
//             if (r.marketName && r.marketName != i.Order.Exchange) return;
//             switch (i.Type) {
//                 case 0:
//                     e = new openOrderEntry(i.Order);
//                     r.openOrders.push(e);
//                     break;
//                 case 1:
//                     for (t = 0; t < r.openOrders().length; t++) r.openOrders()[t].orderUuid == i.Order.OrderUuid && r.openOrders()[t].update(i.Order);
//                     break;
//                 case 2:
//                     for (t = 0; t < r.openOrders().length; t++) r.openOrders()[t].orderUuid == i.Order.OrderUuid && (f = r.openOrders()[t]);
//                     f && r.openOrders.remove(f);
//                     break;
//                 case 3:
//                     for (t = 0; t < r.openOrders().length; t++) r.openOrders()[t].orderUuid == i.Order.OrderUuid && (f = r.openOrders()[t]);
//                     f && r.openOrders.remove(f)
//             }
//             r.nounce(i.Nounce)
//         }
//     };
//     o = function(n) {
//         var i, t, f, u, e;
//         if (n.serviceData) {
//             if (i = n.serviceData, t = i.Orders, r.openOrders([]), t)
//                 for (f in t) u = t[f], u.Closed || (e = new openOrderEntry(u), r.openOrders.push(e));
//             r.nounce(i.Nounce)
//         }
//     };
//     $("#event-store").on("data-update-orders", e);
//     $("#event-store").on("data-query-orders", o);
//     u = function() {
//         $("#event-store").trigger({
//             type: "request-query-orders"
//         })
//     };
//     r.resize = function(n) {
//         f.openOrdersDataTable("resize", n)
//     };
//     r.getOpenOrders = function() {
//         u()
//     };
//     r.cancelOrder = function(n, t) {
//         $(n).prop("disabled", !0);
//         $(n).toggleClass("active");
//         var i = {
//             MarketName: t.exchange,
//             orderId: t.orderUuid
//         };
//         bittrex && bittrex.version && bittrex.version.needsUpdate || $.ajax({
//             url: "/api/v2.0/auth/market/TradeCancel",
//             type: "POST",
//             cache: !1,
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: i,
//             success: function(n) {
//                 var t, i;
//                 n.success ? (t = "Your order has been submitted for cancelling.", i = "Order Cancel Submitted", showAlert(t, "info", i)) : (t = "There was an error cancelling your order. Please try again. Error:" + n.message, i = "Error Cancelling Order", showAlert(t, "danger", i));
//                 console.log("cancelOrder(): success")
//             },
//             error: function() {
//                 showAlert("There was an error cancelling your order. Please try again.", "warning", "Error Cancelling Order");
//                 $(n).toggleClass("active");
//                 $(n).prop("disabled", !1);
//                 console.log("cancelOrder(): error")
//             },
//             complete: function() {}
//         })
//     };
//     f = $("#" + n).openOrdersDataTable({
//         dataSource: r.openOrders,
//         customToolbar: t.customToolbar,
//         orderCancel: r.cancelOrder
//     });
//     r.getOpenOrders()
// }

// function userTradeConfirm(n) {
//     "use strict";
//     var t = this,
//         i = n.marketName;
//     t.displayOrderModal = ko.observable(!1);
//     t.orderModalTitle = ko.pureComputed(function() {
//         switch (t.orderType()) {
//             case "MARKET_BUY":
//                 return "Market Buy";
//             case "MARKET_SELL":
//                 return "Market Sell";
//             case "LIMIT_BUY":
//                 return "Limit Buy";
//             case "LIMIT_SELL":
//                 return "Limit Sell";
//             case "CONDITIONAL_BUY":
//                 return "Conditional Buy";
//             case "CONDITIONAL_SELL":
//                 return "Conditional Sell"
//         }
//     });
//     t.orderType = ko.observable();
//     t.orderSubType = ko.observable();
//     t.orderTypeMsg = ko.pureComputed(function() {
//         switch (t.orderType()) {
//             case "MARKET_BUY":
//                 return "Confirm Market Buy Order";
//             case "MARKET_SELL":
//                 return "Market Sell";
//             case "LIMIT_BUY":
//                 return "Limit Buy";
//             case "LIMIT_SELL":
//                 return "Limit Sell";
//             case "CONDITIONAL_BUY":
//                 return "Conditional Buy";
//             case "CONDITIONAL_SELL":
//                 return "Conditional Sell"
//         }
//     });
//     t.orderQuantity = ko.observable();
//     t.orderPrice = ko.observable();
//     t.orderSubTotal = ko.observable();
//     t.orderCommission = ko.observable();
//     t.orderTotal = ko.observable();
//     t.orderTimeInForce = ko.observable({
//         label: ""
//     });
//     t.orderCondition = ko.observable();
//     t.orderTarget = ko.observable();
//     t.orderIsConditional = ko.pureComputed(function() {
//         return t.orderCondition() ? t.orderCondition().setting != "NONE" : !1
//     });
//     t.orderConditionMsg = ko.pureComputed(function() {
//         if (t.orderType() && t.orderCondition() && t.orderTarget()) {
//             if (t.orderType().indexOf("BUY") > -1) return "Your buy order will submit when the next executed trade is " + t.orderCondition().label + " " + Number(t.orderTarget()).toFixed(8);
//             if (t.orderType().indexOf("SELL") > -1) return "Your sell order will submit when the next executed trade is " + t.orderCondition().label + " " + Number(t.orderTarget()).toFixed(8)
//         }
//         return ""
//     });
//     t.showModal = function(n, i, r, u, f, e, o, s, h) {
//         t.orderSetup(n, i, r, u, f, e, o, s, h);
//         t.resetOrderModal();
//         t.displayOrderModal(!0)
//     };
//     t.cancelModal = function() {
//         t.displayOrderModal(!1)
//     };
//     t.orderSetup = function(n, i, r, u, f, e, o, s, h) {
//         t.orderType(n);
//         t.orderQuantity(Number(r).toFixed(8));
//         t.orderPrice(Number(i).toFixed(8));
//         t.orderCommission(u);
//         t.orderSubTotal(f);
//         t.orderTotal(e);
//         t.orderTimeInForce(o);
//         t.orderCondition(s);
//         t.orderTarget(h)
//     };
//     t.showOrderSubmit = ko.observable(!1);
//     t.enableOrderSubmit = ko.observable(!1);
//     t.isOrderSpinnerActive = ko.observable(!1);
//     t.resetOrderModal = function() {
//         t.showOrderSubmit(!0);
//         t.enableOrderSubmit(!0);
//         t.isOrderSpinnerActive(!1);
//         t.orderModalAlert("")
//     };
//     t.orderModalAlert = ko.observable("");
//     t.showOrderModalAlert = function(n, i) {
//         t.orderModalAlert('<div id="alertdiv" class="alert ' + i + '">' + n + "<\/span><\/div>")
//     };
//     t.orderSubmit = function() {
//         var n = {
//                 MarketName: i
//             },
//             r = "";
//         if (t.orderType().indexOf("BUY") > -1 ? r = "/api/v2.0/auth/market/TradeBuy" : t.orderType().indexOf("SELL") > -1 && (r = "/api/v2.0/auth/market/TradeSell"), t.orderType().indexOf("LIMIT") > -1 ? n.OrderType = "LIMIT" : t.orderType().indexOf("MARKET") > -1 && (n.OrderType = "MARKET"), n.Quantity = t.orderQuantity(), n.Rate = t.orderPrice(), n.TimeInEffect = t.orderTimeInForce().setting, n.ConditionType = t.orderIsConditional ? t.orderCondition().setting : "NONE", n.Target = t.orderTarget(), t.enableOrderSubmit(!1), t.isOrderSpinnerActive(!0), !bittrex || !bittrex.version || !bittrex.version.needsUpdate) return $.ajax({
//             url: r,
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             cache: !1,
//             data: n,
//             success: function(n) {
//                 if (n.success) {
//                     var i = "Your " + n.result.BuyOrSell + " order of " + n.result.Quantity.toFixed(8) + " units of " + n.result.MarketCurrency + " at " + n.result.Rate.toFixed(8) + " per unit has been placed.",
//                         r = n.result.MarketCurrency + " " + n.result.BuyOrSell + " Placed";
//                     showAlert(i, "info", r);
//                     t.showOrderSubmit(!1);
//                     t.displayOrderModal(!1)
//                 } else t.showOrderModalAlert(n.message, "alert alert-danger alert-dismissable"), t.showOrderSubmit(!1)
//             },
//             error: function() {
//                 t.showOrderModalAlert("There was an error placing your order.  Please try again.", "alert alert-warning alert-dismissable")
//             },
//             complete: function() {
//                 t.isOrderSpinnerActive(!1)
//             }
//         }), !1
//     }
// }

// function userTrade(n) {
//     "use strict";

//     function p() {
//         var n = $("#form_Buy");
//         n.validate({
//             debug: !1,
//             rules: {
//                 price_Buy: "rule_BuyPrice",
//                 target_Buy: "rule_BuyTarget",
//                 total_Buy: "rule_BuyTotal"
//             },
//             submitHandler: function() {
//                 t.selectedBuyType().setting == "LIMIT" ? t.confirm.showModal("LIMIT_BUY", t.buyPrice(), t.buyVolume(), t.buyCommission(), t.buySubTotal(), t.buyTotal(), t.selectedBuyTimeInForce(), t.availableCondition[0], 0) : t.confirm.showModal("LIMIT_BUY", t.buyPrice(), t.buyVolume(), t.buyCommission(), t.buySubTotal(), t.buyTotal(), t.selectedBuyTimeInForce(), t.selectedBuyCondition(), t.buyTarget())
//             },
//             highlight: function(n) {
//                 $(n).closest(".field-box").addClass("has-error")
//             },
//             unhighlight: function(n) {
//                 $(n).closest(".field-box").removeClass("has-error")
//             },
//             errorElement: "span",
//             errorClass: "help-block",
//             errorPlacement: function(n, t) {
//                 t.parent(".input-group").length ? n.insertAfter(t.parent()) : n.insertAfter(t)
//             }
//         });
//         $.validator.addMethod("rule_BuyPrice", function(n) {
//             return $("input[name=radio_Buy]:checked", "#form_Buy").val() == "MARKET_BUY" ? !0 : n >= 1e-8
//         }, "Bids must be greater than .00000001 for limit orders");
//         $.validator.addMethod("rule_BuyTarget", function(n) {
//             return t.selectedBuyType().setting == "CONDITIONAL" ? t.selectedBuyCondition().setting == "NONE" ? !1 : n >= 1e-8 : !0
//         }, "Select a condition and a target greater than .00000001 for conditional orders");
//         $.validator.addMethod("rule_BuyTotal", function(n) {
//             return n >= .0005
//         }, "The minimum order size is .00050000")
//     }

//     function w() {
//         var n = $("#form_Sell");
//         n.validate({
//             rules: {
//                 price_Sell: "rule_SellPrice",
//                 target_Sell: "rule_SellTarget",
//                 total_Sell: "rule_SellTotal"
//             },
//             submitHandler: function() {
//                 t.selectedSellType().setting == "LIMIT" ? t.confirm.showModal("LIMIT_SELL", t.sellPrice(), t.sellVolume(), t.sellCommission(), t.sellSubTotal(), t.sellTotal(), t.selectedSellTimeInForce(), t.availableCondition[0], 0) : t.confirm.showModal("LIMIT_SELL", t.sellPrice(), t.sellVolume(), t.sellCommission(), t.sellSubTotal(), t.sellTotal(), t.selectedSellTimeInForce(), t.selectedSellCondition(), t.sellTarget())
//             },
//             highlight: function(n) {
//                 $(n).closest(".field-box").addClass("has-error")
//             },
//             unhighlight: function(n) {
//                 $(n).closest(".field-box").removeClass("has-error")
//             },
//             errorElement: "span",
//             errorClass: "help-block",
//             errorPlacement: function(n, t) {
//                 t.parent(".input-group").length ? n.insertAfter(t.parent()) : n.insertAfter(t)
//             }
//         });
//         $.validator.addMethod("rule_SellPrice", function(n) {
//             return $("input[name=radio_Sell]:checked", "#form_Sell").val() == "MARKET_SELL" ? !0 : n >= 1e-8
//         }, "Asks must be greater than .00000001 for limit orders");
//         $.validator.addMethod("rule_SellTarget", function(n) {
//             return t.selectedSellType().setting == "CONDITIONAL" ? t.selectedSellCondition().setting == "NONE" ? !1 : n >= 1e-8 : !0
//         }, "Select a condition and a target greater than .00000001 for conditional orders");
//         $.validator.addMethod("rule_SellTotal", function(n) {
//             return n >= .0005
//         }, "The minimum order size is .00050000")
//     }
//     var t = this,
//         r = n.marketName,
//         u = n.baseCurrencyName,
//         f = n.marketCurrencyName,
//         i;
//     t.retryCount = 0;
//     t.PRICE_CHANGE = 1;
//     t.VOL_CHANGE = 2;
//     t.TOTAL_CHANGE = 3;
//     t.confirm = new userTradeConfirm(n);
//     t.nounce = ko.observable(0);
//     t.marketName = r;
//     t.baseCurrency = u;
//     t.marketCurrency = f;
//     t.baseCurrencyBalance = ko.observable(0);
//     t.marketCurrencyBalance = ko.observable(0);
//     t.last = 0;
//     t.bid = 0;
//     t.ask = 0;
//     t.availableOrderType = [{
//         code: "Limit  <span class='caret'><\/span>",
//         label: "Limit (Default)",
//         setting: "LIMIT"
//     }, {
//         code: "Conditional <span class='caret'><\/span>",
//         label: "Conditional",
//         setting: "CONDITIONAL"
//     }, ];
//     t.availableTimeInForce = [{
//         code: "Good 'Til Cancelled <span class='caret'><\/span>",
//         label: "Good 'Til Cancelled (Default)",
//         setting: "GOOD_TIL_CANCELLED"
//     }, {
//         code: "Immediate or Cancel <span class='caret'><\/span>",
//         label: "Immediate or Cancel",
//         setting: "IMMEDIATE_OR_CANCEL"
//     }, ];
//     t.availableCondition = [{
//         code: "Condition <span class='caret'><\/span>",
//         label: "None",
//         setting: "NONE"
//     }, {
//         code: "&gt;= <span class='caret'><\/span>",
//         label: "Greater Than Or Equal To",
//         setting: "GREATER_THAN"
//     }, {
//         code: "&lt;= <span class='caret'><\/span>",
//         label: "Less Than Or Equal To",
//         setting: "LESS_THAN"
//     }, ];
//     t.buyType = ko.observable("LIMIT_BUY");
//     t.buyTrigger;
//     t._buyVolume = ko.observable(0);
//     t.buyVolume = ko.computed({
//         read: function() {
//             return t._buyVolume().toFixed(8)
//         },
//         write: function(n) {
//             t.buyTrigger = t.VOL_CHANGE;
//             t._buyVolume(new Number(n))
//         }
//     });
//     t._buyPrice = ko.observable(0);
//     t.buyPrice = ko.computed({
//         read: function() {
//             return t._buyPrice().toFixed(8)
//         },
//         write: function(n) {
//             t.buyTrigger = t.PRICE_CHANGE;
//             t._buyPrice(new Number(n))
//         }
//     });
//     t._buySubTotal = ko.computed(function() {
//         return t._buyVolume() * t._buyPrice()
//     }, this);
//     t.buySubTotal = ko.computed(function() {
//         return t._buySubTotal().toFixed(8)
//     }, this);
//     t._buyCommission = ko.computed(function() {
//         return t._buySubTotal() * .0025
//     }, this);
//     t.buyCommission = ko.computed(function() {
//         return t._buyCommission().toFixed(8)
//     }, this);
//     t._buyTotal = ko.observable(0);
//     t.buyTotal = ko.computed({
//         read: function() {
//             return t._buyTotal().toFixed(8)
//         },
//         write: function(n) {
//             t.buyTrigger = t.TOTAL_CHANGE;
//             t._buyTotal(new Number(n))
//         }
//     });
//     t.buyVolume.subscribe(function(n) {
//         if (n == 0 && t.buyTrigger != t.TOTAL_CHANGE) t._buyTotal(0);
//         else if (t.buyTrigger == t.VOL_CHANGE) {
//             var i = t._buyVolume() * t._buyPrice(),
//                 r = i * .0025;
//             t._buyTotal(i + r)
//         }
//     });
//     t.buyPrice.subscribe(function() {
//         var n, r, u, i;
//         if (t.buyMaxEnabled()) {
//             i = t.baseCurrencyBalance() * .9975;
//             n = i / t._buyPrice();
//             try {
//                 n = Number(n.toFixed(8))
//             } catch (f) {
//                 n = 0
//             }
//             t._buyVolume(n);
//             t._buyTotal(t.baseCurrencyBalance())
//         } else t._buyVolume() > 0 ? (t.buyTrigger = t.VOL_CHANGE, r = t._buyVolume() * t._buyPrice(), u = r * .0025, t._buyTotal(r + u)) : t._buyTotal() > 0 && (t.buyTrigger = t.TOTAL_CHANGE, i = t._buyTotal() * .9975, t._buyVolume(i / t._buyPrice()))
//     });
//     t.buyTotal.subscribe(function(n) {
//         if (n == 0 || t._buyPrice() == 0) t._buyVolume(0);
//         else if (t.buyTrigger == t.TOTAL_CHANGE) {
//             var r = t._buyTotal() * .9975,
//                 i = r / t._buyPrice();
//             isNaN(i) && (i = 0);
//             t._buyVolume(i)
//         }
//     });
//     t.buyMaxEnabled = ko.observable(!1);
//     t.buyMax = function() {
//         t.buyMaxEnabled(!t.buyMaxEnabled());
//         t.buyMaxEnabled() && t.buyMaxCalc()
//     };
//     t.buyMaxCalc = function() {
//         var i = t.baseCurrencyBalance() * .9975,
//             n = i / t.buyPrice();
//         try {
//             n = Number(n.toFixed(8))
//         } catch (r) {
//             n = 0
//         }
//         t._buyVolume(n);
//         t._buyTotal(t.baseCurrencyBalance())
//     };
//     t.buyLastPrice = function() {
//         t.updateBuyPrice(t.last)
//     };
//     t.buyBidPrice = function() {
//         t.updateBuyPrice(t.bid)
//     };
//     t.buyAskPrice = function() {
//         t.updateBuyPrice(t.ask)
//     };
//     t.buyAdvanced = function() {
//         t.buyAdvancedShow(!t.buyAdvancedShow())
//     };
//     t.buyAdvancedShow = ko.observable(!0);
//     t.selectedBuyType = ko.observable(t.availableOrderType[0]);
//     t.selectedBuyTimeInForce = ko.observable(t.availableTimeInForce[0]);
//     t.selectedBuyCondition = ko.observable(t.availableCondition[0]);
//     t.buyTarget = ko.observable(0);
//     t.setBuyOrderType = function(n) {
//         t.selectedBuyType(n)
//     };
//     t.setBuyTimeInForce = function(n) {
//         t.selectedBuyTimeInForce(n)
//     };
//     t.setBuyCondition = function(n) {
//         t.selectedBuyCondition(n)
//     };
//     t.sellType = ko.observable("LIMIT_SELL");
//     t.sellTrigger;
//     t._sellVolume = ko.observable(0);
//     t.sellVolume = ko.computed({
//         read: function() {
//             return t._sellVolume().toFixed(8)
//         },
//         write: function(n) {
//             t.sellTrigger = t.VOL_CHANGE;
//             t._sellVolume(new Number(n))
//         }
//     });
//     t._sellPrice = ko.observable(0);
//     t.sellPrice = ko.computed({
//         read: function() {
//             return t._sellPrice().toFixed(8)
//         },
//         write: function(n) {
//             t.sellTrigger = t.PRICE_CHANGE;
//             t._sellPrice(new Number(n))
//         }
//     });
//     t._sellSubTotal = ko.computed(function() {
//         return t._sellVolume() * t.sellPrice()
//     }, this);
//     t.sellSubTotal = ko.computed(function() {
//         return t._sellSubTotal().toFixed(8)
//     }, this);
//     t._sellCommission = ko.computed(function() {
//         return t._sellSubTotal() * .0025
//     }, this);
//     t.sellCommission = ko.computed(function() {
//         return t._sellCommission().toFixed(8)
//     }, this);
//     t._sellTotal = ko.observable(0);
//     t.sellTotal = ko.computed({
//         read: function() {
//             return t._sellTotal().toFixed(8)
//         },
//         write: function(n) {
//             t.sellTrigger = t.TOTAL_CHANGE;
//             t._sellTotal(new Number(n))
//         }
//     });
//     t.sellVolume.subscribe(function(n) {
//         if (n == 0 && t.sellTrigger != t.TOTAL_CHANGE) t._sellTotal(0);
//         else if (t.sellTrigger == t.VOL_CHANGE) {
//             var i = t._sellVolume() * t._sellPrice(),
//                 r = i * .0025;
//             t._sellTotal(i - r)
//         }
//     });
//     t.sellPrice.subscribe(function() {
//         var n, i, r;
//         t.sellMaxEnabled() ? (t._sellVolume(t.marketCurrencyBalance()), n = t.marketCurrencyBalance() * t._sellPrice(), i = n * .0025, t._sellTotal(n - i)) : t._sellVolume() > 0 ? (t.sellTrigger = t.VOL_CHANGE, n = t._sellVolume() * t._sellPrice(), i = n * .0025, t._sellTotal(n - i)) : t._sellTotal() > 0 && (t.sellTrigger = t.TOTAL_CHANGE, r = t._sellTotal() * 1.0025, t._sellVolume(r / t._sellPrice()))
//     });
//     t.sellTotal.subscribe(function(n) {
//         if (n == 0 || t._sellPrice() == 0) t._sellVolume(0);
//         else if (t.sellTrigger == t.TOTAL_CHANGE) {
//             var r = t._sellTotal() * 1.0025,
//                 i = r / t._sellPrice();
//             isNaN(i) && (i = 0);
//             t._sellVolume(i)
//         }
//     });
//     t.sellMaxEnabled = ko.observable(!1);
//     t.sellMax = function() {
//         t.sellMaxEnabled(!t.sellMaxEnabled());
//         t.sellMaxEnabled() && t.sellMaxCalc()
//     };
//     t.sellMaxCalc = function() {
//         t.sellVolume(t.marketCurrencyBalance())
//     };
//     t.sellLastPrice = function() {
//         t.sellPrice(t.last)
//     };
//     t.sellBidPrice = function() {
//         t.sellPrice(t.bid)
//     };
//     t.sellAskPrice = function() {
//         t.sellPrice(t.ask)
//     };
//     t.sellAdvanced = function() {
//         t.sellAdvancedShow(!t.sellAdvancedShow())
//     };
//     t.sellAdvancedShow = ko.observable(!0);
//     t.selectedSellType = ko.observable(t.availableOrderType[0]);
//     t.selectedSellTimeInForce = ko.observable(t.availableTimeInForce[0]);
//     t.selectedSellCondition = ko.observable(t.availableCondition[0]);
//     t.sellTarget = ko.observable(0);
//     t.setSellOrderType = function(n) {
//         t.selectedSellType(n)
//     };
//     t.setSellTimeInForce = function(n) {
//         t.selectedSellTimeInForce(n)
//     };
//     t.setSellCondition = function(n) {
//         t.selectedSellCondition(n)
//     };
//     t.updateBuyVolume = function(n) {
//         t.buyVolume(n)
//     };
//     t.updateSellVolume = function(n) {
//         t.sellVolume(n)
//     };
//     t.updateBuyPrice = function(n) {
//         t.buyPrice(n);
//         t.buyTarget(n)
//     };
//     t.updateSellPrice = function(n) {
//         t.sellPrice(n);
//         t.sellTarget(n)
//     };
//     t.setRate = function(n) {
//         t.updateBuyPrice(n);
//         t.updateSellPrice(n)
//     };
//     t.setSize = function(n) {
//         t.updateBuyVolume(n);
//         t.updateSellVolume(n)
//     };
//     t.sellImmediate = function(n, i) {
//         t.updateSellPrice(n);
//         i > t.marketCurrencyBalance() ? t.sellVolume(t.marketCurrencyBalance()) : t.sellVolume(i);
//         t.confirm.showModal("LIMIT_SELL", t.sellPrice(), t.sellVolume(), t.sellCommission(), t.sellSubTotal(), t.sellTotal(), t.availableTimeInForce[1], t.availableCondition[0], 0)
//     };
//     t.buyImmediate = function(n, i, r) {
//         t.updateBuyPrice(n);
//         r > t.baseCurrencyBalance() ? t.buyTotal(t.baseCurrencyBalance()) : t.buyTotal(r);
//         t.confirm.showModal("LIMIT_BUY", t.buyPrice(), t.buyVolume(), t.buyCommission(), t.buySubTotal(), t.buyTotal(), t.availableTimeInForce[1], t.availableCondition[0], 0)
//     };
//     var e = function(n) {
//             if (n) {
//                 var r = n.serviceData;
//                 t.nounce() + 1 < r.Nounce ? i() : t.nounce() + 1 == r.Nounce && (r.Delta && (r.Delta.Currency == t.baseCurrency && t.baseCurrencyBalance(r.Delta.Available), r.Delta.Currency == t.marketCurrency && t.marketCurrencyBalance(r.Delta.Available)), t.nounce(r.Nounce))
//             }
//         },
//         o = function(n) {
//             var i, r;
//             if (n.serviceData) {
//                 if (i = n.serviceData, t.baseCurrencyBalance(0), t.marketCurrencyBalance(0), i.State)
//                     for (r in i.State) r == t.baseCurrency && t.baseCurrencyBalance(i.State[r].Available), r == t.marketCurrency && t.marketCurrencyBalance(i.State[r].Available);
//                 t.nounce(i.Nounce)
//             }
//         },
//         s = function(n) {
//             n && t.setRate(n.serviceData)
//         },
//         h = function(n) {
//             n && t.setSize(n.serviceData)
//         },
//         c = function(n) {
//             n && t.sellImmediate(n.serviceData.rate, n.serviceData.sumMarket, n.serviceData.sumBase)
//         },
//         l = function(n) {
//             n && t.buyImmediate(n.serviceData.rate, n.serviceData.sumMarket, n.serviceData.sumBase)
//         },
//         a = function(n) {
//             n && (t.last = n.serviceData)
//         },
//         v = function(n) {
//             n && (t.bid = n.serviceData)
//         },
//         y = function(n) {
//             n && (t.ask = n.serviceData)
//         };
//     $("#event-store").on("data-update-balances", e);
//     $("#event-store").on("data-query-balances", o);
//     $("#event-store").on("data-update-rate", s);
//     $("#event-store").on("data-update-size", h);
//     $("#event-store").on("data-sellToDepth", c);
//     $("#event-store").on("data-buyToDepth", l);
//     $("#event-store").on("data-update-last-" + t.marketName, a);
//     $("#event-store").on("data-update-bid-" + t.marketName, v);
//     $("#event-store").on("data-update-ask-" + t.marketName, y);
//     i = function() {
//         $("#event-store").trigger({
//             type: "request.query.balances"
//         })
//     };
//     p();
//     w()
// }(function(n) {
//     var r = {
//             dataSource: null,
//             pageLength: 10,
//             showMarkets: !1
//         },
//         u, i, t = {
//             init: function(f) {
//                 return u = this, f = jQuery.extend({}, r, f), this.each(function() {
//                     function u(n) {
//                         return n == "GREATER_THAN" ? "greater than or equal to" : n == "LESS_THAN" ? "less than or equal to" : "Error"
//                     }

//                     function e(n) {
//                         var t = "<div><ul style='list-style-type: none; margin-left:-30px'><li><strong>Time in Effect:<\/strong> " + (n.ImmediateOrCancel ? "Immediate or Cancel" : "Good 'Til Cancelled") + "<\/li>";
//                         return t += n.IsConditional ? "<li><strong>Condition:<\/strong> Place this order when the price is " + u(n.Condition) + " " + n.ConditionTarget.toFixed(8) + "<\/li>" : "", t + "<\/ul><\/div>"
//                     }
//                     var r = jQuery(this);
//                     f.id = this.id;
//                     r.data("options", f);
//                     i = r.DataTable({
//                         dom: 'T<"clear">C<"clear">lBfrtip',
//                         buttons: ["csv", "colvis", ],
//                         info: !0,
//                         deferRender: !0,
//                         paging: !0,
//                         pageLength: f.pageLength,
//                         pagingType: "full_numbers",
//                         lengthChange: !0,
//                         searching: !0,
//                         ordering: !0,
//                         processing: !1,
//                         stateSave: !0,
//                         order: [
//                             [0, "desc"]
//                         ],
//                         autoWidth: !1,
//                         serverSide: !1,
//                         language: {
//                             emptyTable: "You have no closed orders."
//                         },
//                         columns: [{
//                             data: "closed",
//                             className: "date"
//                         }, {
//                             data: "timeStamp",
//                             className: "date"
//                         }, {
//                             data: "exchange",
//                             className: "text",
//                             visible: f.showMarkets
//                         }, {
//                             data: "orderType",
//                             className: "text"
//                         }, {
//                             data: "limit",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "filled",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "quantity",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "pricePerUnit",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "total",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, ],
//                         columnDefs: [{
//                             targets: [0, 1],
//                             searchable: !1,
//                             render: function(n) {
//                                 return n ? n.format("MM/DD/YYYY hh:mm:ss A") : ""
//                             }
//                         }, {
//                             targets: [2],
//                             render: function(n) {
//                                 return n ? "<a href='/Market/Index?MarketName=" + n + "'>" + n + "<\/a>" : ""
//                             }
//                         }, {
//                             targets: [3],
//                             searchable: !1,
//                             render: function(n, t, i) {
//                                 return n ? i.Remaining != i.Quantity && i.PricePerUnit ? n + "&nbsp<span class='label label-warning'>Partial<\/span>" : (n == "LIMIT_SELL" ? n = "Limit Sell" : n == "LIMIT_BUY" && (n = "Limit Buy"), n) : "<span class='label label-primary'>Market<\/span>"
//                             }
//                         }, {
//                             targets: [4],
//                             render: function(n) {
//                                 return n ? n.toFixed(8) : "<span class='label label-primary'>Market<\/span>"
//                             }
//                         }, {
//                             targets: [5, 6],
//                             render: function(n) {
//                                 return n ? n.toFixed(8) : new Number(0).toFixed(8)
//                             }
//                         }, {
//                             targets: [7],
//                             render: function(n, t, i) {
//                                 return i ? n ? n.toFixed(8) : ".00000001" : "<span class='label label-warning'>Cancelled<\/span>"
//                             }
//                         }, {
//                             targets: [8],
//                             render: function(n, t, i) {
//                                 return n ? ((i.orderType == "LIMIT_BUY" || i.orderType == "MARKET_BUY") && (n = -n), n.toFixed(8)) : new Number(0).toFixed(8)
//                             }
//                         }, ],
//                         ajax: function(n, t) {
//                             var i = {};
//                             i.data = f.dataSource();
//                             t(i)
//                         }
//                     });
//                     setTimeout(function() {
//                         var t = n("#ZeroClipboard_TableToolsMovie_1"),
//                             i;
//                         t.height(17);
//                         t.width(21);
//                         i = t.parent();
//                         i.css({
//                             left: 88,
//                             width: 52
//                         })
//                     }, 1e4);
//                     setupDatatableToolbar(f);
//                     f.dataSource.subscribe(function() {
//                         t.reload(f.id)
//                     });
//                     i.on("click", "button", function() {
//                         var t = n("#" + f.id).DataTable(),
//                             r, u;
//                         if (n(this).hasClass("openInfoBtn")) {
//                             var i = n(this).find(".glyphicon"),
//                                 o = this.parentNode.parentNode,
//                                 s = this.parentNode;
//                             i.hasClass("glyphicon-minus-sign") ? (i.removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign"), t.row(o).remove().draw()) : (i.addClass("glyphicon-minus-sign").removeClass("glyphicon-plus-sign"), r = t.cell(s).index().row, u = t.row(r).data(), t.row(r).child(e(u)).show())
//                         }
//                     })
//                 })
//             },
//             reload: function(t) {
//                 var i = n("#" + t).DataTable();
//                 i.ajax.reload(null, !1)
//             },
//             resize: function(n) {
//                 var t = jQuery(this).DataTable();
//                 switch (n) {
//                     case "xs":
//                         t.columns([0, 1, 4, 5]).visible(!1, !1);
//                         t.columns.adjust().draw(!1);
//                         break;
//                     case "sm":
//                         t.columns([0, 1, 4, 5]).visible(!1, !1);
//                         t.columns.adjust().draw(!1);
//                         break;
//                     case "md":
//                         t.columns([0, 1]).visible(!1, !1);
//                         t.columns([4, 5]).visible(!0, !1);
//                         t.columns.adjust().draw(!1);
//                         break;
//                     case "lg":
//                         t.columns([0, 1, 4, 5]).visible(!0, !1);
//                         t.columns.adjust().draw(!1)
//                 }
//             }
//         };
//     n.fn.historyDataTable = function(i) {
//         if (t[i]) return t[i].apply(this, Array.prototype.slice.call(arguments, 1));
//         if (typeof i != "object" && i) n.error("Method " + i + " does not exist on jQuery.historyDataTable");
//         else return t.init.apply(this, arguments)
//     }
// })(jQuery),
// function(n) {
//     var r = {
//             dataSource: null,
//             orderCancel: null,
//             pageLength: 10,
//             showMarkets: !1,
//             forceCacheUpdate: !1
//         },
//         u, i, t = {
//             init: function(f) {
//                 return u = this, f = jQuery.extend({}, r, f), this.each(function() {
//                     function u(n) {
//                         return n == "GREATER_THAN" ? "greater than or equal to" : n == "LESS_THAN" ? "less than or equal to" : "Error"
//                     }

//                     function e(n) {
//                         var t = "<div><ul style='list-style-type: none; margin-left:-30px'><li><strong>Time in Effect:<\/strong> " + (n.immediateOrCancel ? "Immediate or Cancel" : "Good 'Til Cancelled") + "<\/li>";
//                         return t += n.isConditional ? "<li><strong>Condition:<\/strong> Place this order when the price is " + u(n.condition) + " " + n.conditionTarget.toFixed(8) + "<\/li>" : "", t + "<\/ul><\/div>"
//                     }
//                     var r = jQuery(this);
//                     f.id = this.id;
//                     r.data("options", f);
//                     i = r.DataTable({
//                         dom: 'C<"clear">lfrtip',
//                         colVis: {
//                             exclude: [0, 9, 10, 11]
//                         },
//                         info: !0,
//                         deferRender: !0,
//                         paging: !0,
//                         pageLength: f.pageLength,
//                         pagingType: "full_numbers",
//                         lengthChange: !0,
//                         searching: !0,
//                         ordering: !0,
//                         processing: !1,
//                         stateSave: !0,
//                         order: [
//                             [1, "desc"]
//                         ],
//                         autoWidth: !1,
//                         serverSide: !1,
//                         language: {
//                             emptyTable: "You have no open orders."
//                         },
//                         columns: [{
//                             data: "action"
//                         }, {
//                             data: "opened",
//                             className: "date"
//                         }, {
//                             data: "exchange",
//                             className: "text",
//                             visible: f.showMarkets
//                         }, {
//                             data: "orderType",
//                             className: "text"
//                         }, {
//                             data: "limit",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "filled",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "quantity",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "quantityRemaining",
//                             className: "number",
//                             orderSequence: ["desc", "asc"],
//                             visible: !1
//                         }, {
//                             data: "pricePerUnit",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "total",
//                             className: "number",
//                             orderSequence: ["desc", "asc"]
//                         }, {
//                             data: "orderUuid",
//                             className: "number",
//                             visible: !1
//                         }, {
//                             data: "action"
//                         }, ],
//                         columnDefs: [{
//                             targets: [0],
//                             orderable: !1,
//                             searchable: !1,
//                             render: function(n) {
//                                 return n ? "<button type='button' class='btn btn-primary btn-xs center-block openInfoBtn'><span class='glyphicon glyphicon-plus-sign'><\/span><\/button>" : ""
//                             }
//                         }, {
//                             targets: [1],
//                             searchable: !1,
//                             render: function(n) {
//                                 return n ? n.format("MM/DD/YYYY hh:mm:ss A") : ""
//                             }
//                         }, {
//                             targets: [2],
//                             render: function(n) {
//                                 return n ? "<a href='/Market/Index?MarketName=" + n + "'>" + n + "<\/a>" : ""
//                             }
//                         }, {
//                             targets: [3],
//                             searchable: !1,
//                             render: function(n) {
//                                 return n ? (n == "LIMIT_SELL" ? n = "Limit Sell" : n == "LIMIT_BUY" && (n = "Limit Buy"), n) : "<span class='label label-primary'>Market<\/span>"
//                             }
//                         }, {
//                             targets: [4],
//                             searchable: !1,
//                             render: function(n) {
//                                 return n ? n.toFixed(8) : "<span class='label label-primary'>Market<\/span>"
//                             }
//                         }, {
//                             targets: [5, 6, 7, 8, 9],
//                             searchable: !1,
//                             render: function(n) {
//                                 return n ? n.toFixed(8) : new Number(0).toFixed(8)
//                             }
//                         }, {
//                             targets: [11],
//                             orderable: !1,
//                             searchable: !1,
//                             render: function(n, t, i) {
//                                 return n ? i.CancelInitiated ? "<button type='button' class='btn btn-danger btn-xs center-block openCancelBtn has-spinner active' disabled> <span class='spinner'><i class='fa fa-spin fa-refresh'><\/i><\/span><i class='fa fa-times'><\/i><\/button>" : "<button type='button' class='btn btn-danger btn-xs center-block openCancelBtn has-spinner'> <span class='spinner'><i class='fa fa-spin fa-refresh'><\/i><\/span><i class='fa fa-times'><\/i><\/button>" : ""
//                             }
//                         }, ],
//                         ajax: function(n, t) {
//                             var i = {};
//                             i.data = f.dataSource();
//                             t(i)
//                         }
//                     });
//                     f.dataSource.subscribe(function() {
//                         t.reload(f.id)
//                     });
//                     setupDatatableToolbar(f);
//                     i.on("click", "button", function() {
//                         var u = n("#" + f.id).DataTable(),
//                             o = n(this).parents("tr"),
//                             i = u.row(o),
//                             r = i.data(),
//                             t;
//                         n(this).hasClass("openCancelBtn") ? f.orderCancel(this, r) : n(this).hasClass("openInfoBtn") && (t = n(this).find(".glyphicon"), t.hasClass("glyphicon-minus-sign") ? (t.removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign"), i.child().remove()) : (t.addClass("glyphicon-minus-sign").removeClass("glyphicon-plus-sign"), i.child(e(r)).show()))
//                     })
//                 })
//             },
//             reload: function(t) {
//                 var i = n("#" + t).DataTable();
//                 i.ajax.reload(null, !1)
//             },
//             resize: function(n) {
//                 var t = jQuery(this).DataTable();
//                 switch (n) {
//                     case "xs":
//                         t.columns([1, 5, 7, 8, 9, 10]).visible(!1, !1);
//                         t.columns([0, 3, 4, 6, 11]).visible(!0, !1);
//                         t.columns.adjust().draw(!1);
//                         break;
//                     case "sm":
//                         t.columns([1, 5, 7, 8, 9, 10]).visible(!1, !1);
//                         t.columns([0, 3, 4, 6, 11]).visible(!0, !1);
//                         t.columns.adjust().draw(!1);
//                         break;
//                     case "md":
//                         t.columns([1, 7, 10]).visible(!1, !1);
//                         t.columns([0, 3, 4, 5, 6, 8, 9, 11]).visible(!0, !1);
//                         t.columns.adjust().draw(!1);
//                         break;
//                     case "lg":
//                         t.columns([7, 10]).visible(!1, !1);
//                         t.columns([0, 1, 3, 4, 5, 6, 8, 9, 11]).visible(!0, !1);
//                         t.columns.adjust().draw(!1)
//                 }
//             }
//         };
//     n.fn.openOrdersDataTable = function(i) {
//         if (t[i]) return t[i].apply(this, Array.prototype.slice.call(arguments, 1));
//         if (typeof i != "object" && i) n.error("Method " + i + " does not exist on jQuery.openOrdersDataTable");
//         else return t.init.apply(this, arguments)
//     }
// }(jQuery);
// var walletViewModel = function() {
//     "use strict";
//     var n = this,
//         r = [{
//             coinType: "BITSHAREX",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "STEEM",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "CRYPTO_NOTE",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "CRYPTO_NOTE_PAYMENTID",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "NXT",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "NXT_MS",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "NXT_ASSET",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "RIPPLE",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "LUMEN",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: "NEM",
//             currencySymbol: null,
//             showBaseAddress: !0
//         }, {
//             coinType: null,
//             currencySymbol: null,
//             showBaseAddress: !1
//         }, ],
//         t, i;
//     n.refreshInterval = 1e3;
//     n.currency = ko.observable("TMP");
//     n.coinName = ko.observable("TMP");
//     n.coinType = ko.observable("None");
//     n.blockTime = ko.observable(-1);
//     n.uses2FA = ko.observable(!1);
//     n.agreeWithdrawal = ko.observable(!1);
//     n.isBitshares = ko.pureComputed(function() {
//         return n.coinType() == "BITSHAREX"
//     }, this);
//     n.isCryptoNote = ko.pureComputed(function() {
//         return n.coinType() == "CRYPTO_NOTE" || n.coinType() == "CRYPTO_NOTE_PAYMENTID"
//     }, this);
//     n.isCryptoNotePaymentId = ko.pureComputed(function() {
//         return n.coinType() == "CRYPTO_NOTE_PAYMENTID"
//     }, this);
//     n.isNxt = ko.pureComputed(function() {
//         return n.coinType() == "NXT" || n.coinType() == "NXT_MS" || n.coinType() == "NXT_ASSET"
//     }, this);
//     n.isRipple = ko.pureComputed(function() {
//         return n.coinType() == "RIPPLE"
//     }, this);
//     n.isStellar = ko.pureComputed(function() {
//         return n.coinType() == "LUMEN"
//     }, this);
//     n.isPercentFee = ko.pureComputed(function() {
//         return n.coinType() == "BITCOIN_PERCENTAGE_FEE"
//     }, this);
//     n.isNem = ko.pureComputed(function() {
//         return n.coinType() == "NEM"
//     }, this);
//     n.isEtherium = ko.pureComputed(function() {
//         return n.coinType() == "ETH"
//     }, this);
//     n.isFactom = ko.pureComputed(function() {
//         return n.coinType() == "FACTOM"
//     }, this);
//     n.isSteem = ko.pureComputed(function() {
//         return n.coinType() == "STEEM"
//     }, this);
//     n.isAntshares = ko.pureComputed(function() {
//         return n.coinType() == "ANTSHARES"
//     }, this);
//     n.isIota = ko.pureComputed(function() {
//         return n.coinType() == "IOTA"
//     }, this);
//     n.isBounceDeposit = ko.pureComputed(function() {
//         return n.coinType() == "FACTOM" ? !0 : n.coinType() == "LISK" ? !0 : n.currency() == "WAVES" ? !0 : n.coinType() == "WAVES_ASSET" ? !0 : !1
//     }, this);
//     n.isEthBounceDeposit = ko.pureComputed(function() {
//         return n.coinType() == "ETH_CONTRACT" ? !0 : !1
//     }, this);
//     n.isLisk = ko.pureComputed(function() {
//         return n.currency() == "LSK"
//     }, this);
//     n.isMaid = ko.pureComputed(function() {
//         return n.currency() == "MAID"
//     }, this);
//     n.isDecorum = ko.pureComputed(function() {
//         return n.currency() == "PDC"
//     }, this);
//     n.isWaves = ko.pureComputed(function() {
//         return n.currency() == "WAVES"
//     }, this);
//     n.currencyInfo = ko.observable(null);
//     t = function(t, i) {
//         var u = r.find(function(n) {
//             return n.coinType == t && (n.currencySymbol == i || n.currencySymbol == null) ? n : n.coinType == null && n.currencySymbol == null ? n : void 0
//         });
//         u != null && n.currencyInfo(u)
//     };
//     n.showBaseAddress = ko.pureComputed(function() {
//         return n.isBitshares() || n.isSteem() || n.isCryptoNote() || n.isNxt() || n.isRipple() || n.isNem() || n.isStellar()
//     }, this);
//     n.labelDepositAddress = ko.pureComputed(function() {
//         return n.isCryptoNote() ? "Payment_Id" : n.isNxt() || n.isNem() ? "Message" : n.isRipple() ? "Tag" : n.isStellar() ? "Memo" : n.isBitshares() || n.isSteem() ? "Memo" : n.isEtherium() ? "Hex Addr" : "Address"
//     }, this);
//     n.addOnDepositAddress = ko.pureComputed(function() {
//         return n.isCryptoNote() ? "ID" : n.isNxt() || n.isNem() ? "MSG" : n.isRipple() ? "TAG" : n.isStellar() ? "MEMO" : n.isBitshares() || n.isSteem() ? "MEMO" : n.isEtherium() ? "HEX" : "ADDR"
//     }, this);
//     n.labelDepositBaseAddress = ko.pureComputed(function() {
//         return n.isCryptoNote() ? "Base Address" : n.isBitshares() || n.isSteem() ? "Registered Acct" : "Address"
//     }, this);
//     n.addOnDepositBaseAddress = ko.pureComputed(function() {
//         return n.isBitshares() || n.isSteem() ? "ACCT" : "ADDR"
//     }, this);
//     n.showDepositCallOut = ko.pureComputed(function() {
//         return n.displayDepositCallOut()
//     }, this);
//     n.displayDepositCallOut = ko.pureComputed(function() {
//         var t = "";
//         return n.isCryptoNote() && (t += "<p>To deposit coins, use the Base Address and payment_id in the transfer command:<p>transfer 1 [Base Addresss] [amount] [Payment_Id]<\/p><\/p><p>If the payment_id is not included in your transfer, we cannot credit your account.  Please do not directly deposit from an exchange or pool unless they allow you to specify a payment id.<\/p><p>We truncate payments to 8 decimal places.  For instance, if you deposit 0.0000000195, you will only receive 0.00000001.<\/p>"), n.isNxt() && (t += "<p>When depositing, please send your message unencrypted.  Please do not send multisig or phased transactions.  They will not be credited.<\/p><p>If the message is not included in your transfer, we cannot credit your account.  Please do not directly deposit from an exchange or pool unless they allow you to specify a message.<\/p>"), n.isNem() && (t += "<p>When depositing, please send your message unencrypted.  Please do not send mosaic or multisig transactions.  They will not be credited.<\/p><p>If the message is not included in your transfer, we cannot credit your account.  Please do not directly deposit from an exchange or pool unless they allow you to specify a message.<\/p>"), n.isRipple() && (t += "<p>If the tag is not included in your transfer, we cannot credit your account.  Please do not directly deposit from an exchange or pool unless they allow you to specify a tag.<\/p>"), n.isStellar() && (t += '<p>Please use "payments" and not "path_payment" when sending XLM.  If the tag is not included in your transfer, we cannot credit your account.  Please do not directly deposit from an exchange or pool unless they allow you to specify a tag.<\/p>'), n.isBitshares() && (t += "<p>To deposit coins, use the Memo and Registered Account in the transfer command:<\/p><p>wallet_transfer &lt;amount&gt; &lt;BTSX&gt; &lt;from_account&gt; " + n.baseAddress() + " &lt;memo_message&gt;<\/p>"), n.isSteem() && (t += "<p>To deposit coins, use the Memo and Registered Account in the transfer command:<\/p><p>transfer &quot;&lt;from_account&gt;&quot; &quot;" + n.baseAddress() + "&quot; &quot;&lt;amount&gt; " + n.currency() + "&quot;  &quot;&lt;memo_message&gt;&quot; true<\/p>"), n.isWaves() && (t += '<p>For details on depositing WAVES, see this <a href="https://slack-files.com/T0779H80P-F1J788H33-42c7641eff" target="_blank">article<\/a>. <\/p>'), n.isIota() && (t += '<p><strong>WARNING:<\/strong> Do not send more than one deposit to this address.  Your IOTA deposit address can only be used once. Once your deposit has been credited to your balance, you will need to request a new address. <\/p><p>Due to security reasons additional deposits cannot be retreived. For details on depositing IOTA, see this <a href="https://support.bittrex.com/hc/en-us/articles/115001052172" target="_blank">article<\/a>. <\/p>'), n.isEtherium() && (t += "<p>Please use a small amount for your first deposit to verify everything is working as expected before sending larger amounts.  Your deposit address must hold more than 0.1 " + n.currency() + " before we will credit your account.  If you deposit less than 0.1 " + n.currency() + " you will need to deposit more until your balance on the block chain holds greater than 0.1 " + n.currency() + "<\/p>", (n.currency() == "ETH" || n.currency() == "ETC") && (t += '<p>Please deposit ETH and ETC to the correct address.  Bittrex will not cross-chain credit your account.  Please view this <a href="https://bittrex.zendesk.com/hc/en-us/articles/223411407">article<\/a> for more information.<\/p>')), n.isBounceDeposit() ? t += "<p>Your deposit address must hold greater than 1 " + n.currency() + " before we will credit your account.  If you deposit less than 1 " + n.currency() + " you will need to deposit more until your balance on the block chain holds greater than 1 " + n.currency() + "<\/p>" : n.isEthBounceDeposit() && (t += "<p>Your deposit address must hold more greater than 0.1 " + n.currency() + " before we will credit your account.  If you deposit less than 0.1 " + n.currency() + " you will need to deposit more until your balance on the block chain holds greater than 0.1 " + n.currency() + "<\/p>"), t + ("<p><strong>Depositing tokens to this address other than " + n.currency() + " will result in your funds being lost.<\/strong><\/p>")
//     }, this);
//     n.displayDepositDisclaimer = ko.pureComputed(function() {
//         return "<strong>I acknowledge the following information: <\/strong>" + ('By depositing tokens to this address, you agree to our <a href="https://bittrex.zendesk.com/hc/en-us/articles/115000961172" target="_blank">deposit recovery policy<\/a>.  Depositing tokens to this address other than ' + n.currency() + " may result in your funds being lost.")
//     }, this);
//     n.labelWithdrawalAddress = ko.pureComputed(function() {
//         return n.isCryptoNote() ? "Payment_Id" : n.isNxt() || n.isNem() ? "Message" : n.isRipple() ? "Tag" : n.isStellar() ? "MemoText" : n.isBitshares() || n.isSteem() ? "Memo" : "Address"
//     }, this);
//     n.addOnWithdrawalAddress = ko.pureComputed(function() {
//         return n.isCryptoNote() ? "ID" : n.isNxt() || n.isNem() ? "MSG" : n.isRipple() ? "TAG" : n.isStellar() ? "MEMO" : n.isBitshares() || n.isSteem() ? "MEMO" : "ADDR"
//     }, this);
//     n.labelWithdrawalBaseAddress = ko.pureComputed(function() {
//         return n.isCryptoNote() ? "Base Address" : n.isBitshares() || n.isSteem() ? "Registered Acct" : n.isEtherium() ? "Hex Address" : "Address"
//     }, this);
//     n.addOnWithdrawalBaseAddress = ko.pureComputed(function() {
//         return n.isBitshares() || n.isSteem() ? "ACCT" : n.isEtherium() ? "HEX" : "ADDR"
//     }, this);
//     n.showWithdrawalCallOut = ko.pureComputed(function() {
//         return n.displayWithdrawalCallOut()
//     }, this);
//     n.displayWithdrawalCallOut = ko.pureComputed(function() {
//         var t = "";
//         return t += "<p>Please verify your withdrawal address.  We cannot refund an incorrect withdrawal.<\/p>", t += "<p><strong>Do not withdrawal directly to a crowdfund or ICO.  We will not credit your account with tokens from that sale.<\/strong><\/p>", n.isEtherium() ? t += '<p>In the withdrawal address field, we only support hex addresses.  DO NOT use direct iban, indirect iban, or unique userid. A proper hex address starts with "0x"<\/p><p>Please use a small amount for your first withdrawal to verify everything is working as expected before sending larger amounts. We cannot recover your funds if the address is incorrect.<\/p>' : (n.isMaid() || n.isAntshares() || n.isDecorum()) && (t += "<p>The " + n.currency() + " asset is not divisible.  Your withdrawal amount (after the TxFee has been deducted) must be a whole number.<\/p>"), t
//     }, this);
//     n.zeroModalTitle = ko.computed(function() {
//         return "Confirm " + n.currency() + " Zeroing"
//     }, this);
//     n.blockTimeAlert = ko.computed(function() {
//         var t = "alert-info",
//             i = "fa-check-circle";
//         return n.blockTime() > 60 ? (t = "alert-danger", i = "fa-exclamation-triangle") : n.blockTime() > 30 && (t = "alert-warning", i = "fa-info-circle"), '<div class="alert ' + t + ' alert-override">    <i class="fa ' + i + '"><\/i>    <span>The last block update occurred ' + n.blockTime() + " minutes ago.<\/span><\/div>"
//     }, this);
//     n.withdrawalUrl = "/Api/v2.0/auth/balance/WithdrawCurrency";
//     n.depositAddress = ko.observable("");
//     n._baseAddress = ko.observable("");
//     n.baseAddress = ko.computed(function() {
//         return n.depositAddress() ? n._baseAddress() : ""
//     }, this);
//     n.placeholderDepositAddress = ko.observable("Loading Address...");
//     n.depositQRCode = ko.pureComputed(function() {
//         return n.currency() != "BTC" ? "" : "<img src='/Balance/BarcodeImage?barcodeText=" + n.depositAddress() + "' />"
//     }, this);
//     n.generateDepositAddress = function() {
//         n.depositAddress("Generating address ...");
//         var t = {
//             currencyName: n.currency()
//         };
//         return $.ajax({
//             url: "/api/v2.0/auth/balance/GenerateDepositAddress",
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: t,
//             success: function(t) {
//                 var i = "",
//                     r = "";
//                 t.success ? n.depositAddress(t.result.Address) : t.message == "ADDRESS_GENERATING" ? setTimeout(function() {
//                     n.getDepositAddress()
//                 }, n.refreshInterval) : t.message == "ACCOUNT_DISABLED" ? (i = "Your account is disabled and is not able to generate addresses", r = "Account Disabled", n.depositAddress("Account disabled")) : t.message == "INVALID_ACCOUNT" ? (i = "You do not have permission to generate this address", r = "Permission Denied", n.depositAddress("Permission denied")) : (i = "There was an error generating your deposit address.  Please try again. Error:" + t.message, r = "Error Generating Address", n.depositAddress("Error generating address"));
//                 i && r && showAlert(i, "danger", r)
//             },
//             error: function() {
//                 showAlert("There was an error generating your deposit address.  Please try again.", "warning", "Error Generating Address");
//                 n.depositAddress("")
//             }
//         }), !1
//     };
//     n.available = ko.observable(0);
//     n.withdrawalAddress = ko.observable();
//     n.withdrawalPaymentId = ko.observable(null);
//     n.withdrawalQuantity = ko.observable(0);
//     n.withdrawalQuantityText = ko.pureComputed(function() {
//         try {
//             return n.withdrawalQuantity() ? n.withdrawalQuantity().toFixed(8) : "0.00000000"
//         } catch (t) {
//             return "0.00000000"
//         }
//     }, this);
//     n._withdrawalFee = ko.observable(0);
//     n.withdrawalPercentFee = ko.pureComputed(function() {
//         return n._withdrawalFee() * 100
//     }, this);
//     n.withdrawalPercentFeeText = ko.pureComputed(function() {
//         return n.withdrawalPercentFee().toFixed(2) + "%"
//     }, this);
//     n.withdrawalFee = ko.pureComputed(function() {
//         return n.isPercentFee() ? n._withdrawalFee() * n.withdrawalQuantity() : n._withdrawalFee()
//     }, this);
//     n.withdrawalFeeText = ko.pureComputed(function() {
//         return n.withdrawalFee().toFixed(8)
//     }, this);
//     n.withdrawalTotal = ko.pureComputed(function() {
//         var t = n.withdrawalQuantity() ? n.withdrawalQuantity() : 0,
//             i = n.withdrawalFee() ? n.withdrawalFee() : 0;
//         return truncateDecimals(t - i, 8)
//     }, this);
//     n.withdrawalTotalText = ko.pureComputed(function() {
//         return n.withdrawalTotal().toFixed(8)
//     }, this);
//     n.withdrawalMessage = ko.pureComputed(function() {
//         return "You are withdrawing " + n.withdrawalTotal() + " " + n.currency() + " which includes a fee of " + n.withdrawalFee() + " " + n.currency() + " to address " + n.withdrawalAddress() + "."
//     }, this);
//     n.withdrawMax = function() {
//         n.withdrawalQuantity(n.available())
//     };
//     n.withdrawalModalTitle = ko.computed(function() {
//         return "Confirm " + n.coinName() + " Withdrawal"
//     }, this);
//     n.authenticationCode = ko.observable();
//     n.isWithdrawing = ko.observable(!1);
//     n.displayWithdrawalModal = ko.observable(!1);
//     n.showWithdrawalModal = function() {
//         n.resetWithdrawalModal();
//         n.displayWithdrawalModal(!0)
//     };
//     n.cancelWithdrawalModal = function() {
//         n.displayWithdrawalModal(!1)
//     };
//     n.showWithdrawalSubmit = ko.observable(!1);
//     n.enableWithdrawalSubmit = ko.observable(!1);
//     n.resetWithdrawalModal = function() {
//         n.showWithdrawalSubmit(!0);
//         n.enableWithdrawalSubmit(!0);
//         n.isWithdrawing(!1);
//         n.withdrawalModalAlert("")
//     };
//     n.withdrawalModalAlert = ko.observable("");
//     n.showWithdrawalModalAlert = function(t, i) {
//         n.withdrawalModalAlert('<div id="alertdiv" class="alert ' + i + '"><a class="close" data-dismiss="alert">×<\/a><span>' + t + "<\/span><\/div>")
//     };
//     n.isZeroing = ko.observable(!1);
//     n.zeroConfirmText = ko.observable();
//     n.displayZeroModal = ko.observable(!1);
//     n.showZeroModal = function() {
//         n.resetZeroModal();
//         n.displayZeroModal(!0)
//     };
//     n.cancelZeroModal = function() {
//         n.displayZeroModal(!1)
//     };
//     n.showZeroSubmit = ko.observable(!1);
//     n.enableZeroSubmit = ko.observable(!1);
//     n.resetZeroModal = function() {
//         n.showZeroSubmit(!0);
//         n.enableZeroSubmit(!0);
//         n.isZeroing(!1);
//         n.zeroModalAlert("")
//     };
//     n.zeroModalAlert = ko.observable("");
//     n.showZeroModalAlert = function(t, i) {
//         n.zeroModalAlert('<div id="alertdiv" class="alert ' + i + '"><a class="close" data-dismiss="alert">×<\/a><span>' + t + "<\/span><\/div>")
//     };
//     n.zeroBalanceConfirm = function() {
//         if (console.log("zero submit"), n.zeroConfirmText() != "CONFIRM") {
//             n.showZeroModalAlert("Type 'CONFIRM' in capital letters to zero your balance", "alert alert-danger alert-dismissable");
//             return
//         }
//         var t = {
//             Currency: n.symbol()
//         };
//         return n.isZeroing(!0), n.enableZeroSubmit(!1), $.ajax({
//             url: "/Usr_Balance/Usr_ZeroBalance",
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: t,
//             success: function(t) {
//                 console.log("zero: success(response): " + t.Message);
//                 switch (t.AlertType) {
//                     case "success":
//                         showalert(t.Message, "alert alert-success alert-dismissable");
//                         break;
//                     case "warning":
//                         n.showZeroModalAlert(t.Message, "alert alert-warning alert-dismissable");
//                         break;
//                     default:
//                         n.showZeroModalAlert(t.Message, "alert alert-danger alert-dismissable")
//                 }
//                 setTimeout(function() {
//                     n.enableZeroSubmit(!1);
//                     n.isZeroing(!1);
//                     t.AlertType == "success" && ($("#balanceTable").dataTable().fnDraw(), $("#pendingWithdrawalsTable").dataTable().fnDraw(), n.displayZeroModal(!1));
//                     console.log("withdraw(): success")
//                 }, 500)
//             },
//             error: function() {
//                 n.showZeroModalAlert("There was an error processing your withdrawal.  Please try again.", "alert alert-warning alert-dismissable");
//                 setTimeout(function() {
//                     $("#balanceListTable").dataTable().fnDraw();
//                     $("#pendingWithdrawalsTable").dataTable().fnDraw();
//                     n.isZeroing(!1);
//                     console.log("withdraw(): failed")
//                 }, 500)
//             }
//         }), !1
//     };
//     n.getDepositAddress = function() {
//         var t = {
//             currencyName: n.currency()
//         };
//         $.ajax({
//             url: "/api/v2.0/auth/balance/GetDepositAddress",
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: t,
//             success: function(t) {
//                 t.success ? t.result.Address && t.result.Address.length > 0 && n.depositAddress(t.result.Address) : t.message == "ADDRESS_NOT_GENERATED" ? n.placeholderDepositAddress("Generate a new address") : t.message == "ADDRESS_GENERATING" ? (n.depositAddress("Waiting for a new address ..."), setTimeout(function() {
//                     n.getDepositAddress()
//                 }, n.refreshInterval)) : n.placeholderDepositAddress("Generate a new address")
//             },
//             error: function() {
//                 console.log("There was an error retreiving the deposit address.")
//             }
//         })
//     };
//     n.getCurrencyInfo = function() {
//         var i = {
//             currencyName: n.currency()
//         };
//         $.ajax({
//             url: "/api/v2.0/pub/Currency/GetCurrencyInfo",
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: i,
//             success: function(i) {
//                 i.success && (i.result.CoinType && (n.coinType(i.result.CoinType), t(i.result.CoinType, n.currency())), i.result.BaseAddress && n._baseAddress(i.result.BaseAddress), i.result.Health && n.blockTime(i.result.Health.MinutesSinceBHUpdated), i.result.TxFee && n._withdrawalFee(Number(i.result.TxFee)), i.result.CurrencyLong && n.coinName(i.result.CurrencyLong))
//             },
//             error: function() {
//                 console.log("There was an error getting currency information.")
//             }
//         })
//     };
//     n.get2FASetting = function() {
//         $.ajax({
//             url: "/Account/Uses2FA",
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: "",
//             success: function(t) {
//                 n.uses2FA(t.Uses2FA)
//             },
//             error: function() {
//                 console.log("There was an error verifying 2FA setting.")
//             }
//         })
//     };
//     n.getAvailableBalance = function() {
//         var t = {
//             currencyName: n.currency()
//         };
//         $.ajax({
//             url: "/api/v2.0/auth/balance/GetBalance",
//             cache: !1,
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: t,
//             success: function(t) {
//                 n.available(0);
//                 t.success && t.result && t.result.Available && n.available(t.result.Available)
//             },
//             error: function() {
//                 console.log("getCurrencyBalance(): error retreiving balance")
//             }
//         })
//     };
//     n.withdrawalFormValidation = function() {
//         function u() {
//             $("#walletWithdrawalModal").modal("hide");
//             n.showWithdrawalModal()
//         }
//         var f = n.currency(),
//             r = $("#walletWithdrawlForm"),
//             t = {},
//             i = {};
//         $("input[name^=withdrawalAddress]").each(function() {
//             t[this.name] = {
//                 required: !0,
//                 minlength: 10
//             };
//             i[this.name] = "Address must be at least 10 characters long"
//         });
//         $("input[name^=withdrawalQuantity]").each(function() {
//             t[this.name] = {
//                 required: !0,
//                 min: 1e-8,
//                 max: 1e7
//             };
//             i[this.name] = "Quantity must be between 10,000,000 and zero"
//         });
//         r.validate({
//             rules: t,
//             messages: i,
//             submitHandler: function() {
//                 u()
//             },
//             highlight: function(n) {
//                 $(n).closest(".field-box").addClass("has-error")
//             },
//             unhighlight: function(n) {
//                 $(n).closest(".field-box").removeClass("has-error")
//             },
//             errorElement: "span",
//             errorClass: "help-block",
//             errorPlacement: function(n, t) {
//                 t.parent(".input-group").length ? n.insertAfter(t.parent()) : n.insertAfter(t)
//             }
//         });
//         n.isNxt() && ($("#withdrawalQuantity").attr("step", 1), $("#withdrawalQuantity").attr("min", 1), $("#withdrawalQuantity").rules("add", {
//             digits: !0
//         }), $("#withdrawalQuantity").rules("add", {
//             digits: !0,
//             min: 1
//         }), $("#withdrawalQuantity").rules("add", {
//             messages: {
//                 min: "Quantity must be a whole number between 10,000,000 and 1",
//                 digits: "Quantity must be a whole number between 10,000,000 and 1",
//                 max: "Quantity must be a whole number between 10,000,000 and 1"
//             }
//         }));
//         n.isBitshares() && ($("#withdrawalPaymentId").rules("add", {
//             maxlength: 19
//         }), $("#withdrawalPaymentId").rules("add", {
//             messages: {
//                 maxlength: "Memo must be 19 characters or less"
//             }
//         }), $("#withdrawalAddress").rules("remove"), $("#withdrawalAddress").rules("add", {
//             required: !0
//         }), $("#withdrawalAddress").rules("add", {
//             messages: {
//                 maxlength: "Account is required"
//             }
//         }), $("#withdrawalQuantity").attr("step", 1), $("#withdrawalQuantity").attr("min", 1e-5), $("#withdrawalQuantity").rules("add", {
//             number: !0
//         }), $("#withdrawalQuantity").rules("add", {
//             number: !0,
//             min: 1e-5
//         }), $("#withdrawalQuantity").rules("add", {
//             messages: {
//                 min: "Quantity must be between 10,000,000 and .00001",
//                 number: "Quantity must be between 10,000,000 and .00001",
//                 max: "Quantity must be between 10,000,000 and .00001"
//             }
//         }));
//         n.isRipple() && (n.withdrawalPaymentId(0), $("#withdrawalPaymentId").rules("add", {
//             maxlength: 10,
//             digits: !0
//         }), $("#withdrawalPaymentId").rules("add", {
//             messages: {
//                 maxlength: "Tag must be 10 digits or less"
//             }
//         }), $("#withdrawalQuantity").attr("step", 1), $("#withdrawalQuantity").attr("min", 1e-5), $("#withdrawalQuantity").rules("add", {
//             number: !0
//         }), $("#withdrawalQuantity").rules("add", {
//             number: !0,
//             min: 1e-5
//         }), $("#withdrawalQuantity").rules("add", {
//             messages: {
//                 min: "Quantity must be between 10,000,000 and .00001",
//                 number: "Quantity must be between 10,000,000 and .00001",
//                 max: "Quantity must be between 10,000,000 and .00001"
//             }
//         }))
//     };
//     n.confirmWithdrawalFormValidation = function() {
//         var u = n.currency(),
//             r = $("#withdrawalConfirmForm"),
//             t = {},
//             i = {};
//         $("input[name^=withdrawalConfirmAuthenticationCode]").each(function() {
//             t[this.name] = {
//                 required: !0,
//                 digits: !0,
//                 max: 999999
//             };
//             i[this.name] = "Your authentication code must be 6-digits"
//         });
//         r.validate({
//             rules: t,
//             messages: i,
//             submitHandler: function() {
//                 n.withdrawalConfirmFormSubmit()
//             }
//         })
//     };
//     n.withdrawalConfirmFormSubmit = function() {
//         console.log("submit");
//         n.showBaseAddress() || n.withdrawalPaymentId(null);
//         var t = {
//             currencyName: n.currency(),
//             quantity: n.withdrawalQuantity(),
//             address: n.withdrawalAddress(),
//             paymentId: n.withdrawalPaymentId(),
//             authenticationCode: n.authenticationCode()
//         };
//         return n.isWithdrawing(!0), n.enableWithdrawalSubmit(!1), $.ajax({
//             url: n.withdrawalUrl,
//             type: "POST",
//             contentType: "application/x-www-form-urlencoded",
//             dataType: "json",
//             data: t,
//             success: function(t) {
//                 var u, r, i;
//                 t.success ? (i = "Your withdrawal of " + t.result.Quantity + " " + t.result.Currency + " submitted.", u = "Withdrawal Submitted", showAlert(i, "info", u), console.log("WithdrawCurrency: success (" + i + ")")) : (r = parseException(t.message), i = r.message + " See this link for more <a href=" + r.url + ">details<\/a>.", n.showWithdrawalModalAlert(i, "alert alert-danger alert-dismissable"));
//                 setTimeout(function() {
//                     n.showWithdrawalSubmit(!1);
//                     n.isWithdrawing(!1);
//                     t.success && n.displayWithdrawalModal(!1)
//                 }, 500)
//             },
//             error: function() {
//                 n.showWithdrawalModalAlert("There was an error processing your withdrawal.  Please try again.", "alert alert-warning alert-dismissable");
//                 setTimeout(function() {
//                     n.isWithdrawing(!1);
//                     console.log("WithdrawCurrency(): failed")
//                 }, 500)
//             }
//         }), !1
//     };
//     i = function(t) {
//         if (t) {
//             var i = t.serviceData;
//             i.Delta && i.Delta.Currency == n.currency() && n.available(i.Delta.Available)
//         }
//     };
//     $("#event-store").on("data-update-balances", i);
//     n.dispose = function() {
//         n.baseAddress().dispose()
//     };
//     n.reset = function() {
//         n.currency("TMP");
//         n.coinType("None");
//         n.blockTime(-1);
//         n.depositAddress("");
//         n._baseAddress("");
//         n.uses2FA(!1);
//         n.available(0);
//         n.withdrawalQuantity(0);
//         n.zeroConfirmText("")
//     };
//     n.setCurrency = function(t) {
//         n.reset();
//         n.currency(t);
//         n.getCurrencyInfo();
//         n.getDepositAddress();
//         n.get2FASetting();
//         n.getAvailableBalance()
//     };
//     n.withdrawalFormValidation();
//     n.confirmWithdrawalFormValidation()
// }