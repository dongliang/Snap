<!-- Toolbox -->
<?php require_once('toolbox-snapper.html'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Snapper Playground</title>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-102948379-1', 'auto');
  ga('send', 'pageview');
  var root="https://blockly-demo.appspot.com/static/";
</script>
<script src="https://blockly-demo.appspot.com/static/blockly_uncompressed.js"></script>
<script src="../generators/javascript.js"></script>
<script src="../generators/javascript/events.js"></script>
<script src="https://blockly-demo.appspot.com/static/generators/javascript/logic.js"></script>
<script src="https://blockly-demo.appspot.com/static/generators/javascript/loops.js"></script>
<script src="../generators/javascript/math.js"></script>
<script src="../generators/javascript/movement.js"></script>
<script src="../generators/javascript/physics.js"></script>
<script src="../generators/javascript/text.js"></script>
<script src="https://blockly-demo.appspot.com/static/generators/javascript/lists.js"></script>
<script src="../generators/javascript/colour.js"></script>
<script src="https://blockly-demo.appspot.com/static/generators/javascript/variables.js"></script>
<script src="https://blockly-demo.appspot.com/static/generators/javascript/procedures.js"></script>
<script src="https://blockly-demo.appspot.com/static/msg/messages.js"></script>
<script src="../blocks/events.js"></script>
<script src="https://blockly-demo.appspot.com/static/blocks/logic.js"></script>
<script src="https://blockly-demo.appspot.com/static/blocks/loops.js"></script>
<script src="https://blockly-demo.appspot.com/static/blocks/math.js"></script>
<script src="../blocks/movement.js"></script>
<script src="../blocks/physics.js"></script>
<script src="https://blockly-demo.appspot.com/static/blocks/text.js"></script>
<script src="https://blockly-demo.appspot.com/static/blocks/lists.js"></script>
<script src="../blocks/colour.js"></script>
<script src="https://blockly-demo.appspot.com/static/blocks/variables.js"></script>
<script src="https://blockly-demo.appspot.com/static/blocks/procedures.js"></script>

<script src="../src/assets/js/snapper_workspace.js"></script>

<link rel="stylesheet" type="text/css" href="../src/assets/css/style.css">

</head>
<body onload="start()">

  <div id="blocklyDiv"></div>

  <h1>Snapper Playground</h1>

  <p><a href="javascript:void(workspace.setVisible(true))">Show</a>
    - <a href="javascript:void(workspace.setVisible(false))">Hide</a></p>

    <form id="options">
      <select name="dir" onchange="document.forms.options.submit()">
        <option value="ltr">LTR</option>
        <option value="rtl">RTL</option>
      </select>
      <select name="toolbox" onchange="document.forms.options.submit()">
        <option value="categories">Categories</option>
        <option value="simple">Simple</option>
      </select>
      <select name="side" onchange="document.forms.options.submit()">
        <option value="start">Start</option>
        <option value="end">End</option>
        <option value="top">Top</option>
        <option value="bottom">Bottom</option>
      </select>
    </form>

    <p>
      <input type="button" value="Export to XML" onclick="toXml()">
      &nbsp;
      <input type="button" value="Import from XML" onclick="fromXml()" id="import">
      <br>
      <input type="button" id="toCodeJs" value="To C#" onclick="toCode('JavaScript')" data-clipboard-target = "#importExport">
      <br>
      <!-- Target -->
      <textarea id="importExport" style="width: 26%; height: 12em"
      onchange="taChange();" onkeyup="taChange()"></textarea>
      <!-- 1. Define some markup -->
      <button class="btn" data-clipboard-target="#importExport">
        Copy to clipboard
      </button>
      <!-- 2. https://clipboardjs.com/ library -->
      <script src="../../clipboard.js-master/dist/clipboard.min.js"></script>
      <!-- 3. Instantiate clipboard by passing a HTML element -->
      <script>
      var btn = document.getElementById('btn');
      var clipboard = new Clipboard('.btn');
      clipboard.on('success', function(e) {
        console.log(e);
      });
      clipboard.on('error', function(e) {
        console.log(e);
      });
      </script>
    </p>

    <p>
      Live Updates:
      <input type="checkbox" onclick="liveUpdates(this.checked)" id="liveCheck">
      Log events:
      <input type="checkbox" onclick="logEvents(this.checked)" id="logCheck">
    </p>
    <!-- Imported Snapper Blockly Blocks -->

  <xml id="toolbox-simple" style="display: none">
    <block type="controls_ifelse"></block>
    <block type="logic_compare"></block>
    <!-- <block type="control_repeat"></block> -->
    <block type="logic_operation"></block>
    <block type="controls_repeat_ext">
      <value name="TIMES">
        <shadow type="math_number">
          <field name="NUM">10</field>
        </shadow>
      </value>
    </block>
    <block type="logic_operation"></block>
    <block type="logic_negate"></block>
    <block type="logic_boolean"></block>
    <block type="logic_null" disabled="true"></block>
    <block type="logic_ternary"></block>
  </xml>

  <xml xmlns="http://www.w3.org/1999/xhtml" id="toolbox-categories" style="display: none">
    <category name="Events" colour="#a5935b">
      <block type="events_init"></block>
      <block type="events_start"></block>
      <block type="events_awake"></block>
      <block type="events_update"></block>
      <block type="events_fixed_update"></block>
      <block type="events_keyhold">
        <field name="KeyHold">W</field>
      </block>
      <block type="events_keypress">
        <field name="KeyPress">W</field>
      </block>
    </category>
    <category name="Logic" colour="210">
      <block type="controls_if"></block>
      <block type="logic_compare"></block>
      <block type="logic_operation"></block>
      <block type="logic_negate"></block>
      <block type="logic_boolean"></block>
      <block type="logic_null" disabled="true"></block>
      <block type="logic_ternary"></block>
    </category>
    <category name="Loops" colour="120">
      <block type="controls_repeat_ext">
        <value name="TIMES">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
      </block>
      <block type="controls_repeat" disabled="true"></block>
      <block type="controls_whileUntil"></block>
      <block type="controls_for">
        <value name="FROM">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="TO">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
        <value name="BY">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
      <block type="controls_forEach"></block>
      <block type="controls_flow_statements"></block>
    </category>
    <category name="Math" colour="230">
      <block type="math_number" gap="32"></block>
      <block type="math_arithmetic">
        <value name="A">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="B">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
      </block>
      <block type="math_single">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">9</field>
          </shadow>
        </value>
      </block>
      <block type="math_trig">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">45</field>
          </shadow>
        </value>
      </block>
      <block type="math_constant"></block>
      <block type="math_number_property">
        <value name="NUMBER_TO_CHECK">
          <shadow type="math_number">
            <field name="NUM">0</field>
          </shadow>
        </value>
      </block>
      <block type="math_round">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">3.1</field>
          </shadow>
        </value>
      </block>
      <block type="math_on_list"></block>
      <block type="math_modulo">
        <value name="DIVIDEND">
          <shadow type="math_number">
            <field name="NUM">64</field>
          </shadow>
        </value>
        <value name="DIVISOR">
          <shadow type="math_number">
            <field name="NUM">10</field>
          </shadow>
        </value>
      </block>
      <block type="math_constrain">
        <value name="VALUE">
          <shadow type="math_number">
            <field name="NUM">50</field>
          </shadow>
        </value>
        <value name="LOW">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="HIGH">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
      </block>
      <block type="math_random_int">
        <value name="FROM">
          <shadow type="math_number">
            <field name="NUM">1</field>
          </shadow>
        </value>
        <value name="TO">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
      </block>
      <block type="math_random_float"></block>
    </category>
    <category name="Movement" colour="#5b80a5">
      <block type="transform_transform"></block>
      <block type="transform_transform">
        <value name="Move">
          <block type="math_vector3">
            <field name="X">0</field>
            <field name="Y">0</field>
            <field name="Z">0</field>
          </block>
        </value>
      </block>
      <block type="math_vector3">
        <field name="X">0</field>
        <field name="Y">0</field>
        <field name="Z">0</field>
      </block>
      <block type="move_facing">
        <field name="direction">Forward</field>
      </block>
      <block type="move_speed">
        <field name="speed">medium</field>
      </block>
      <block type="move_move">
        <field name="speed">speedMedium</field>
      </block>
      <block type="move_rotate">
        <field name="speed">speedMedium</field>
      </block>
      <block type="math_arithmetic_operator">
        <field name="OP">plusEqual</field>
      </block>
      <block type="move_move">
        <field name="speed">speedMedium</field>
        <value name="Vector">
          <block type="move_facing">
            <field name="direction">Forward</field>
          </block>
        </value>
      </block>
      <block type="move_rotate">
        <field name="orientation">clockwise</field>
        <field name="speed">speedMedium</field>
        <value name="Vector">
          <block type="move_facing">
            <field name="direction">Up</field>
          </block>
        </value>
      </block>
      <block type="move_rotate_angle">
        <field name="orientation">clockwise</field>
        <field name="angle">90</field>
        <value name="Vector">
          <block type="move_facing">
            <field name="direction">Up</field>
          </block>
        </value>
      </block>
      <block type="move_scale">
        <field name="scale">scaleMedium</field>
      </block>
      <block type="move_direction">
        <field name="orientation">clockwise</field>
        <field name="angle">90</field>
        <value name="Vector">
          <block type="move_facing">
            <field name="direction">Up</field>
          </block>
        </value>
      </block>
      <block type="move_jump">
      <value name="Dir">
        <block type="move_facing">
          <field name="direction">Up</field>
        </block>
      </value>
      <value name="Speed">
        <block type="math_number">
          <field name="NUM">300</field>
        </block>
      </value>
    </block>
    </category>
    <category name="Physics" colour="#5ba55b">
      <block type="physics_oncollisionenter"></block>
    </category>
    <category name="Text" colour="160">
      <block type="text"></block>
      <block type="text_join"></block>
      <block type="text_append">
        <value name="TEXT">
          <shadow type="text"></shadow>
        </value>
      </block>
      <block type="text_length">
        <value name="VALUE">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_isEmpty">
        <value name="VALUE">
          <shadow type="text">
            <field name="TEXT"></field>
          </shadow>
        </value>
      </block>
      <block type="text_indexOf">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">text</field>
          </block>
        </value>
        <value name="FIND">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_charAt">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">text</field>
          </block>
        </value>
      </block>
      <block type="text_getSubstring">
        <value name="STRING">
          <block type="variables_get">
            <field name="VAR">text</field>
          </block>
        </value>
      </block>
      <block type="text_changeCase">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_trim">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_count">
        <value name="SUB">
          <shadow type="text"></shadow>
        </value>
        <value name="TEXT">
          <shadow type="text"></shadow>
        </value>
      </block>
      <block type="text_replace">
        <value name="FROM">
          <shadow type="text"></shadow>
        </value>
        <value name="TO">
          <shadow type="text"></shadow>
        </value>
        <value name="TEXT">
          <shadow type="text"></shadow>
        </value>
      </block>
      <block type="text_reverse">
        <value name="TEXT">
          <shadow type="text"></shadow>
        </value>
      </block>
      <label text="Input/Output:" web-class="ioLabel"></label>
      <block type="text_print">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
      <block type="text_prompt_ext">
        <value name="TEXT">
          <shadow type="text">
            <field name="TEXT">abc</field>
          </shadow>
        </value>
      </block>
    </category>
    <category name="Lists" colour="260">
      <block type="lists_create_with">
        <mutation items="0"></mutation>
      </block>
      <block type="lists_create_with"></block>
      <block type="lists_repeat">
        <value name="NUM">
          <shadow type="math_number">
            <field name="NUM">5</field>
          </shadow>
        </value>
      </block>
      <block type="lists_length"></block>
      <block type="lists_isEmpty"></block>
      <block type="lists_indexOf">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_getIndex">
        <value name="VALUE">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_setIndex">
        <value name="LIST">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_getSublist">
        <value name="LIST">
          <block type="variables_get">
            <field name="VAR">list</field>
          </block>
        </value>
      </block>
      <block type="lists_split">
        <value name="DELIM">
          <shadow type="text">
            <field name="TEXT">,</field>
          </shadow>
        </value>
      </block>
      <block type="lists_sort"></block>
      <block type="lists_reverse"></block>
    </category>
    <category name="Colour" colour="20">
      <block type="colour_picker"></block>
      <block type="colour_random"></block>
      <block type="colour_rgb">
        <value name="RED">
          <shadow type="math_number">
            <field name="NUM">100</field>
          </shadow>
        </value>
        <value name="GREEN">
          <shadow type="math_number">
            <field name="NUM">50</field>
          </shadow>
        </value>
        <value name="BLUE">
          <shadow type="math_number">
            <field name="NUM">0</field>
          </shadow>
        </value>
      </block>
      <block type="colour_blend">
        <value name="COLOUR1">
          <shadow type="colour_picker">
            <field name="COLOUR">#ff0000</field>
          </shadow>
        </value>
        <value name="COLOUR2">
          <shadow type="colour_picker">
            <field name="COLOUR">#3333ff</field>
          </shadow>
        </value>
        <value name="RATIO">
          <shadow type="math_number">
            <field name="NUM">0.5</field>
          </shadow>
        </value>
      </block>
      <block type="color_color_to_unity">
      <field name="color">#33cc00</field>
    </block>
    <block type="color_color_to_unity">
      <field name="color">#33cc00</field>
      <statement name="code">
        <block type="color_material_color"></block>
      </statement>
    </block>
    </category>
    <sep></sep>
    <category name="Variables" colour="330" custom="VARIABLE"></category>
    <category name="Functions" colour="290" custom="PROCEDURE"></category>
  </xml>
  
  <!--<xml id="toolbox-categories" style="display: none">
<?php readfile('toolbox-snapper.xml'); ?>
</xml>-->
</body>
</html>
