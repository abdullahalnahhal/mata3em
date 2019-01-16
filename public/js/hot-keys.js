HELPERS = function(){
	this.unique = function(value, index, self){
		return self.indexOf(value) === index;
	}
	this.isKeyMatched =function(element, index){
		 return element === hot_key.pressed_watcher[index];
	}
	this.isArraysEqyual = function(arr1 , arr2){
		JSON.stringify(arr1.sort()) === JSON.stringify(arr1.sort())
	}
}
HOTKEY = function(){
	this.pressed_watcher = [];
	this.key = {
		// main keys
		"b-space":8,"tab":9,"enter":13,"shift":16,"ctr":17,"alt":18,"pb":19,"caps#":20,"num#":144,"scroll#":145,"esc":27,"l-win":91,"r-win":92,
		// main board
		"pg-down":34,"pg-up":33,"end":35,"home":36,"insert":45,"delete":46,
		// arrows
		"l-arr":37,"r-arr":38,"t-arr":39,"d-arr":40,
		// characters
		"a" :65,"b" :66,"c" :67,"d" :68,"e" :69,"f" :70,"g" :71,"h" :72,"i" :73,"j" :74,"k" :75,"l" :76,"m" :77,"n" :78,"o" :79,"p" :80,"q" :81,"r" :82,"s" :83,"t" :84,"u" :85,"v" :86,"w" :87,"x" :88,"y" :89,"z" :90,
		// top numbers
		"0":48,"1":49,"2":50,"3":51,"4":52,"5":53,"6":54,"7":55,"8":56,"9":57,
		// left numbers
		"#0":96,"#1":97,"#2":98,"#3":99,"#4":100,"#5":101,"#6":102,"#7":103,"#8":104,"#9":105,
		// signs
		";":145,"=":187,",":188,"#":189,"":190,"/":191,"`":192,"{":219,"}":221,"\\":220,"'":222,
		// mathematical signs
		"*":106,"+":107,"-":109,".":110,"÷":111,
		// F keys
		"f1":112,"f2":113,"f3":114,"f4":115,"f5":116,"f6":117,"f7":118,"f8":119,"f9":120,"f10":121,"f11":122,"f12":123,
	}
	this.get_code = function(key_sign){
		key_sign = key_sign.toLowerCase();
		return this.key[key_sign];
	}
	this.get_key = function(key_code){
		for (key in this.key) {
			if (this.key[key] == key_code) {
				return key;
			}
		}
	}
	this.set_pressed = function(event){
		key_code = event.keyCode;
		hot_key.pressed_watcher.push(key_code);
		hot_key.pressed_watcher = hot_key.pressed_watcher.filter(helpers.unique);
	}
	this.remove_pressed = function(event){
		key_code = event.keyCode;
		index = hot_key.pressed_watcher.indexOf(key_code);
		if (index > -1) {
			hot_key.pressed_watcher.splice(index, 1);
		}
	}
	this.is_pressed = function(key){
		key_code = this.get_code(key);
		if (hot_key.pressed_watcher.indexOf(key_code) != -1) {
			return true;
		}
	}
	this.translate = function(key_combination_code){
		codes = [];
		for (var i = 0; i < key_combination_code.length; i++) {
			code = hot_key.key[key_combination_code[i]];
			codes.push(code);
		}
		return codes;
	}
	this.on = function(key_combination,callback){
		key_combination = key_combination.split("+");
		if (key_combination.length != hot_key.pressed_watcher.length) {
			return false;
		}
		key_combination_code = hot_key.translate(key_combination);
		check = key_combination_code.every(helpers.isKeyMatched);
		if (check) {
			callback();
		}
		return check;
	}
}
var hot_key = new HOTKEY();
var helpers = new HELPERS();
document.addEventListener("keydown", hot_key.set_pressed, false);
document.addEventListener("keyup", hot_key.remove_pressed, false);
