
if ( typeof Object.create !== 'function' ) {
	Object.create = function( obj ) {
		function F() {}
		F.prototype = obj;
		return new F();
	};
}

(function( $, window, document, undefined ) {

	var TextEffect = {
		init: function (options, elem) {
			var _options = {};
			this.$elem = $(elem);
			this.oldText = this.$elem.html();
			typeof options === 'string' ? _options.effect = options : _options = options;
			this.options = $.extend( {}, $.fn.textJumble.options, _options );
			this[this.options.effect]();
		},

		setup: function (effectOption) {
			this.textArray = [];
			this.$elem.html('');  // oddly jQuery.empty() doesn't work as well here.
			for (var i = 0; i < this.oldText.length; i++) {
				this.textArray[i] = "<span class='text-effect' style='" + effectOption + "'>" + this.oldText.substr(i, 1) + "</span>";
				this.$elem.append(this.textArray[i]);
			}
		},

		jumble: function () {
			var self = this;
			var letterArray = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
			var i = 0;
			this.setup();
			var jumbleEffectInterval = setInterval(function () {
				if (self.jumbleInterval) {
					clearInterval(self.jumbleInterval);
				}
				self.runJumble(letterArray, i);
				self.$elem.children('span.text-effect').eq(i).html(self.oldText.substr(i, 1)).css('color', self.$elem.css('color'));
				if (i === (self.oldText.length - 1)) {
					clearInterval(jumbleEffectInterval);
					self.reset();
				} else {
					i++;
				}
			}, self.options.effectSpeed);
		},

		runJumble: function (letterArray, jumbleLength) {
			var self = this;
			this.jumbleInterval = setInterval(function () {
				self.$elem.css('visibility', 'visible');
				for (var i = (self.textArray.length - 1); i > jumbleLength; i--) {
					if (self.oldText.substr(i, 1) !== ' ') {
						self.$elem.children('span.text-effect').eq(i).html(letterArray[Math.floor(Math.random() * (letterArray.length - 1))]).css('color', self.options.jumbleColor);
					} else {
						self.$elem.children('span.text-effect').eq(i).html(' ');
					}
				}
			}, 70);
		},

		reset: function () {
			this.$elem.html(this.oldText);
		}
	};

	$.fn.textJumble = function(options) {
		return this.each(function() {
			var texteffect = Object.create(TextEffect);
			texteffect.init(options, this);
		});
	};

	$.fn.textJumble.options = {
		effect: 'jumble',
		effectSpeed: 150,
		completionSpeed: 6000,
		jumbleColor: '#7f7f7f',
		reverse: false
	};
})( jQuery, window, document );

$( "#BtnRandom" ).click(function () {
	let getitem;
	let lastgc;
	var error;
	$.ajax({
		type: "POST",
		url: "config/randomitem.php",
		data: {cmd : 'checkrandom'},
		success: function(res) {
			var arr = res.split('#');
			let i2=0;
			if(arr[0] == "RANDOM:NOPOINTS") {
				swal("ไม่สามารถสุ่มได้!", "Points ของท่านไม่เพียงพอ...กรุณาเติมเงิน", "warning");
			} else {
				$.ajax({
					type: "POST",
					url: "config/randomitem.php",
					data: {cmd : 'getitemrandom'},
					success: function(res) {
						var r = JSON.parse(res);
						if(!r.error) {
							getitem = r.getitem;
							lastgc = r.lastgc;
						}else{
							error = r.error.message
						}
					}
				}).then(function(){
					var randall = JSON.parse(arr[0]);
					$("#BtnRandom").attr('disabled','disabled');
					document.getElementById("BtnRandom").className = "btn btn-md btn-danger";
					for(i=1;i<20;i++) {
						i2 += i;
						setTimeout(function() { 
							$('#display-Itemimg').attr('src','assets/image/random/' + randall[Math.floor(Math.random()*randall.length)] + '.png'); 
						}, i2*20);
					}
					
					i2 += i;
					
					setTimeout(function() {
						if(!error) {
							document.getElementById("BtnRandom").className = "btn btn-md btn-success";
							document.getElementById("BtnRandom").innerHTML = "<i class='fa fa-random'></i> ทำการสุ่มไอเทมอีกครั้ง";
							$('#BtnRandom').removeAttr('disabled');
							if(getitem > 0) {
								$('#display-Itemimg').attr('src','assets/image/random/' + getitem + '.png');
								swal("ขอแสดงความยินดี", "คุณได้รับไอเทม", "success");
							} else {
								$('#display-Itemimg').attr('src','assets/image/random/0.png');
								swal("ขอแสดงความเสียใจ", "ดูเหมือนว่าคุณจะชอบกินเค็มนะครับ", "error");
							}

							document.getElementById('currentgc').innerHTML = lastgc + " GC";
						}else{
							alert("เกิดข้อผิดพลาด: \n" + error.message);
						}
					}, i2*20);
				});
			}
		}
	});
});