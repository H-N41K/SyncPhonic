var _0x1afd=['ImageUtils','img/crosses.png','wrapS','wrapT','RepeatWrapping','set','MeshBasicMaterial','AdditiveBlending','Mesh','scale','getCamera','update','Object3D','getVizHolder','add'];(function(_0x52fcf9,_0x476188){var _0x22d33c=function(_0x2786cb){while(--_0x2786cb){_0x52fcf9['push'](_0x52fcf9['shift']());}};_0x22d33c(++_0x476188);}(_0x1afd,0x74));var _0x4ba8=function(_0x487ff5,_0x473cba){_0x487ff5=_0x487ff5-0x0;var _0x18ee6b=_0x1afd[_0x487ff5];return _0x18ee6b;};var SkyBox=function(){var _0x509296;var _0x2c5eba;function _0xeac7a1(){events['on'](_0x4ba8('0x0'),_0x1d6e04);_0x509296=new THREE[(_0x4ba8('0x1'))]();SpliceMain[_0x4ba8('0x2')]()[_0x4ba8('0x3')](_0x509296);imgTextureStars=THREE[_0x4ba8('0x4')]['loadTexture'](_0x4ba8('0x5'));imgTextureStars[_0x4ba8('0x6')]=imgTextureStars[_0x4ba8('0x7')]=THREE[_0x4ba8('0x8')];imgTextureStars['repeat'][_0x4ba8('0x9')](0xc,0xc);backMaterial=new THREE[(_0x4ba8('0xa'))]({'blending':THREE[_0x4ba8('0xb')],'map':imgTextureStars,'transparent':!![],'depthTest':!![],'opacity':0x1,'fog':![]});_0x2c5eba=new THREE[(_0x4ba8('0xc'))](new THREE['BoxGeometry'](0x258,0x258,0x258),backMaterial);_0x2c5eba[_0x4ba8('0xd')]['x']=-0x1;_0x509296[_0x4ba8('0x3')](_0x2c5eba);}function _0x1d6e04(){_0x2c5eba['position']['copy'](SpliceMain[_0x4ba8('0xe')]()['position']);}return{'init':_0xeac7a1,'update':_0x1d6e04};}();