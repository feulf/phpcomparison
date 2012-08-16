<?php

/* template_loop.html */
class __TwigTemplate_0268a026bb68ac4369f2a9a54cc543b5 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Column selection
var0
You can select text by column using Alt + mouse drag. This feature is not available in word-wrap mode.
var1
Multiple settings
\tYou can add or remove file types and specify different options for each file types. For example, you can set word-wrap feature off in a plain text file and turn it on automatically when you load an HTML document. You can specify multiple settings in Settings & Syntax page of the Preferences dialog box. var4
Edit large files 
\tUnlike Windows' built-in Notepad, it can handle large text files. The file size is only limited by the amount of free system memory.
var2
Powerful undo/redo
\tEditPlus allows multiple undo/redo, so you can safely cancel any typing error.
Word wrap
\tWord-wrap feature helps to edit long lines more conveniently. You can turn on/off word-wrap feature through Word Wrap command on Document menu.
Line number
\tLine numbers can improve readability of HTML documents and program source codes. You can show or hide line number through Line Number command on Document menu.
Ruler
var3
Ruler improves readability and helps you find the cursor location quickly. You can show or hide ruler through Ruler command of View menu.
'Drag and drop' editing
\tEditPlus supports OLE 'drag and drop' editing which is more efficient than clipboard commands. You can also drag and drop text between Cliptext window and the document.
Powerful search and replacevar5
\tEditPlus supports powerful search and replace command which can handle Regular Expressions. EditPlus also supports Find in Files command so you can search text in multiple files. You can also set markers at a specific line and go to the marker quickly from any part of the document. See Search menu commands for more details.

Spell checker
\tEditPlus supports spell checker so you can correct typing errors in your document easily. Currently, only English dictionary is supported.
Splitter window
\tEditPlus allows user to divide the document window into several panes and edit different part of the file concurrently. To divide current document, run Split command on Window menu.
Keystroke recording
\tYou can record keystrokes and playback it later. Use Record Keystrokes command on Tools menu.

Customizable hotkeys
\tYou can customize hotkeys of all commands of EditPlus. See Keyboard page of the Preferences dialog box.
Monitor clipboard
\tThis option can speed up repeated cut-and-paste operations. Any text that is copied or cut to clipboard will automatically be appended to current document. See Monitor Clipboard command.
Column Marker
\tColumn marker is a vertical line which indicates specific column location. Column marker can be useful for column-oriented programming languages such as COBOL or FORTRAN. See Column Marker command.

Column selection

You can select text by column using Alt + mouse drag. This feature is not available in word-wrap mode.
Multiple settings
\tYou can add or remove file types and specify different options for each file types. For example, you can set word-wrap feature off in a plain text file and turn it on automatically when you load an HTML document. You can specify multiple settings in Settings & Syntax page of the Preferences dialog box.
Edit large files 
\tUnlike Windows' built-in Notepad, it can handle large text files. The file size is only limited by the amount of free system memory.

Powerful undo/redo
\tEditPlus allows multiple undo/redo, so you can safely cancel any typing error.
Word wrap
\tWord-wrap feature helps to edit long lines more conveniently. You can turn on/off word-wrap feature through Word Wrap command on Document menu.
Line number
\tLine numbers can improve readability of HTML documents and program source codes. You can show or hide line number through Line Number command on Document menu.
Ruler
var6
Ruler improves readability and helps you find the cursor location quickly. You can show or hide ruler through Ruler command of View menu.
'Drag and drop' editing
\tEditPlus supports OLE 'drag and drop' editing which is more efficient than clipboard commands. You can also drag and drop text between Cliptext window and the document.
Powerful search and replace
\tEditPlus supports powerful search and replace command which can handle Regular Expressions. EditPlus also supports Find in Files command so you can search text in multiple files. You can also set markers at a specific line and go to the marker quickly from any part of the document. See Search menu commands for more details.

Spell checker
\tEditPlus supports spell checker so you can correct typing errors in your document easily. Currently, only English dictionary is supported.
Splitter window
\tEditPlus allows user to divide the document window into several panes and edit different part of the file concurrently. To divide current document, run Split command on Window menu.
Keystroke recording
\tYou can record keystrokes and playback it later. Use Record Keystrokes command on Tools menu.

Customizable hotkeys
\tYou can customize hotkeys of all commands of EditPlus. See Keyboard page of the Preferences dialog box.
Monitor clipboard
\tThis option can speed up repeated cut-and-paste operations. Any text that is copied or cut to clipboard will automatically be appended to current document. See Monitor Clipboard command.
Column Marker
\tColumn marker is a vertical line which indicates specific column location. Column marker can be useful for column-oriented programming languages such as COBOL or FORTRAN. See Column Marker command.
\tColumn selection

You can select text by column using Alt + mouse drag. This feature is not available in word-wrap mode.
Multiple settings
\tYou can add or remove file types and specify different options for each file types. For example, you can set word-wrap feature off in a plain text file and turn it on automatically when you load an HTML document. You can specify multiple settings in Settings & Syntax page of the Preferences dialog box.
Edit large files 
\tUnlike Windows' built-in Notepad, it can handle large text files. The file size is only limited by the amount of free system memory.

Powerful undo/redo
\tEditPlus allows multiple undo/redo, so you can safely cancel any typing error.
Word wrap
\tWord-wrap feature helps to edit long lines more conveniently. You can turn on/off word-wrap feature through Word Wrap command on Document menu.
Line number
\tLine numbers can improve readability of HTML documents and program source codes. You can show or hide line number through Line Number command on Document menu.
Ruler

Ruler improves readability and helps you find the cursor location quickly. You can show or hide ruler through Ruler command of View menu.
'Drag and drop' editing
\tEditPlus supports OLE 'drag and drop' editing which is more efficient than clipboard commands. You can also drag and drop text between Cliptext window and the document.
Powerful search and replace
\tEditPlus supports powerful search and replace command which can handle Regular Expressions. EditPlus also supports Find in Files command so you can search text in multiple files. You can also set markers at a specific line and go to the marker quickly from any part of the document. See Search menu commands for more details.
var7
Spell checker
\tEditPlus supports spell checker so you can correct typing errors in your document easily. Currently, only English dictionary is supported.
Splitter window
\tEditPlus allows user to divide the document window into several panes and edit different part of the file concurrently. To divide current document, run Split command on Window menu.
Keystroke recording

";
        // line 101
        if (isset($context["foo"])) { $_foo_ = $context["foo"]; } else { $_foo_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_foo_);
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            echo "You can record keystrokes and playback it later. Use Record Keystrokes command on Tools menu.

Customizable hotkeys ";
            // line 103
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "id"), "html", null, true);
            echo "
\tYou can customize hotkeys of all commands of EditPlus. See Keyboard page of the Preferences dialog box.
Monitor clipboard";
            // line 105
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "name"), "html", null, true);
            echo "
\tThis option can speed up repeated cut-and-paste operations. Any text that is copied or cut to clipboard will automatically ";
            // line 106
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "param1"), "html", null, true);
            echo "be appended to current document. See Monitor Clipboard command.
Column Marker
\tColumn marker is a vertical line which ";
            // line 108
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "param2"), "html", null, true);
            echo "indicates specific column location. Column marker can be useful for column-oriented programming languages such as COBOL or FORTRAN. See var17Column Marker command.Column selection ";
            if (isset($context["item"])) { $_item_ = $context["item"]; } else { $_item_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_item_, "param3"), "html", null, true);
            echo "

You can select text by column using Alt + mvar14ouse drag. This feature is not available in word-wrap mode.";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 111
        echo "Multiple settings
\tYou can add or remove file types and specify different options for each file types. For example, you can set word-wrap feature off in a plain text file and turn it on automatically when you load an HTML document.var18 You can specify multiple settings in Settings & Syntax page of the Preferences dialog box.
Edit large files 
\tUnlike Windows' built-in Notepad, it can handle var15large text files. The file size is only limited by the amount of free system memory.

Powerful undo/redo
\tEditPlus allows multiple undo/redo, so you can safely cancel any typing error.
Word wrap
\tWord-wrap feature helps to edit long var19lines more conveniently. You can turn on/off word-wrap feature through Word Wrap command on Document menu.
Line number
\tLine numbers can improve readability of HTMLvar20 documents and program source codes. You can show or hide line number through Line Number command on Document menu.
Ruler

Ruler improves readability and helps you find the cursor location quickly. You can show or hide ruler through Ruler command of View menu.
'Drag and drop' editing
\tEditPlus supports OLE 'drag and drop' editing which is morevar16 efficient than clipboard commands. You can also drag and drop text between Cliptext window and the document.
Powerful search and replace
\tEditPlus supports powerful search and replace command which can handle Regular Expressions. EditPlus also supports Find in Files command so you can search text in multiple files. You can also set markers at a specific line and go to the marker quickly from any part of the document. See Search menu commands for more details.var9

Spell checker
\tEditPlus supports spell checker so you can correct typing errors in your document easily. Currently, only English dictionary is supported.
Splitter window
\tEditPlus allows user to divide the document window into several panes and edit different part of the file concurrently. To divide current document, run Split command on Window menu.
Keystroke recording
\tYou can record keystrokes and playback it later. Use Record Keystrokes command on Tools menu.
var10
Customizable hotkeys
\tYou can customize hotkeys of all var13commands of EditPlus. See Keyboard page of the Preferences dialog box.
Monitor clipboard
var12
\tThis option can speed up repeated cut-and-paste operations. Any text that is copied or cut to clipboard will automatically be appended to current document. See Monitor Clipboard command.
Column Marker
\tColumn marker is a vertical line which indicates specific column location. Column marker can be useful for column-oriented programming languages such as COBOL or FORTRAN. See Column Marker command.
\tvar11
";
    }

    public function getTemplateName()
    {
        return "template_loop.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
