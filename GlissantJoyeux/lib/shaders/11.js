var _0x13ac=['vec2\x20offset\x20=\x20vec2((rand(vec2(time,time))\x20-\x200.5)*amount,(rand(vec2(time\x20+\x20999.0,time\x20+\x20999.0))-\x200.5)\x20*amount);','p\x20+=\x20offset;','ShakeShader','varying\x20vec2\x20vUv;','void\x20main()\x20{','vUv\x20=\x20uv;','gl_Position\x20=\x20projectionMatrix\x20*\x20modelViewMatrix\x20*\x20vec4(\x20position,\x201.0\x20);','join','uniform\x20sampler2D\x20tDiffuse;','uniform\x20float\x20time;','uniform\x20float\x20amount;','float\x20rand(vec2\x20co){','return\x20fract(sin(dot(co.xy\x20,vec2(12.9898,78.233)))\x20*\x2043758.5453);','vec2\x20p\x20=\x20vUv;'];(function(_0x4bfe83,_0x448bce){var _0x415585=function(_0xfad97c){while(--_0xfad97c){_0x4bfe83['push'](_0x4bfe83['shift']());}};_0x415585(++_0x448bce);}(_0x13ac,0x1de));var _0x4cab=function(_0x303898,_0x1a633a){_0x303898=_0x303898-0x0;var _0x542c15=_0x13ac[_0x303898];return _0x542c15;};THREE[_0x4cab('0x0')]={'uniforms':{'tDiffuse':{'type':'t','value':null},'time':{'type':'f','value':0x0},'amount':{'type':'f','value':0.05}},'vertexShader':[_0x4cab('0x1'),_0x4cab('0x2'),_0x4cab('0x3'),_0x4cab('0x4'),'}'][_0x4cab('0x5')]('\x0a'),'fragmentShader':[_0x4cab('0x6'),_0x4cab('0x7'),_0x4cab('0x8'),_0x4cab('0x1'),_0x4cab('0x9'),_0x4cab('0xa'),'}',_0x4cab('0x2'),_0x4cab('0xb'),_0x4cab('0xc'),_0x4cab('0xd'),'gl_FragColor\x20=\x20texture2D(tDiffuse,\x20p);','}']['join']('\x0a')};