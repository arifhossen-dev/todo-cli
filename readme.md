# Todo list - CLI application

## Available commands
```
# Adding a new task ✅
    ./src/cli.php add "Buy groceries"
# Output: Task added successfully (ID: 1)

# Updating and deleting tasks
    ./src/cli.php update 1 "Buy groceries and cook dinner"
    ./src/cli.php delete 1

# Marking a task as in progress or done
    ./src/cli.php mark-in-progress 1
    ./src/cli.php mark-done 1

# Listing all tasks
    ./src/cli.php list

# Listing tasks by status
    ./src/cli.php list done
    ./src/cli.php list todo
    ./src/cli.php list in-progress
```


I'll help you create a comprehensive Markdown test file that covers all common Markdown elements and some extended syntax.


# Markdown Test File

## Table of Contents
- [Headers](#headers)
- [Emphasis](#emphasis)
- [Lists](#lists)
- [Links](#links)
- [Images](#images)
- [Code](#code)
- [Tables](#tables)
- [Blockquotes](#blockquotes)
- [Horizontal Rules](#horizontal-rules)
- [Extended Syntax](#extended-syntax)

## Headers

# Header 1
## Header 2
### Header 3
#### Header 4
##### Header 5
###### Header 6

## Emphasis

*This text is italicized*
_This is also italicized_

**This text is bold**
__This is also bold__

***This text is bold and italicized***
___This is also bold and italicized___

~~This text is strikethrough~~

## Lists

### Unordered Lists
* Item 1
* Item 2
  * Subitem 2.1
  * Subitem 2.2
    * Sub-subitem 2.2.1
* Item 3

### Ordered Lists
1. First item
2. Second item
   1. Subitem 2.1
   2. Subitem 2.2
3. Third item

### Task Lists
- [x] Completed task
- [ ] Incomplete task
- [x] Another completed task
  - [ ] Subtask 1
  - [x] Subtask 2

## Links

[Basic Link](https://www.example.com)
[Link with Title](https://www.example.com "Link Title")
<https://www.example.com>
[Reference Link][reference]

[reference]: https://www.example.com

## Images

![Alt Text](https://via.placeholder.com/150)
![Image with Title](https://via.placeholder.com/150 "Image Title")

## Code

### Inline Code
This is `inline code` within text.

### Code Blocks
```javascript
function sayHello() {
    console.log("Hello, World!");
}
```

```python
def say_hello():
    print("Hello, World!")
```

## Tables

| Header 1 | Header 2 | Header 3 |
|----------|----------|----------|
| Cell 1   | Cell 2   | Cell 3   |
| Cell 4   | Cell 5   | Cell 6   |

### Aligned Tables

| Left | Center | Right |
|:-----|:------:|------:|
|Left  |Center  |Right  |
|Align |Align   |Align  |

## Blockquotes

> This is a blockquote
> 
> This is the second line of the blockquote
>> This is a nested blockquote

## Horizontal Rules

---
***
___

## Extended Syntax

### Footnotes

Here's a sentence with a footnote[^1].

[^1]: This is the footnote content.

### Definition Lists

Term
: Definition 1
: Definition 2

### Emoji
:smile: :heart: :thumbsup:

### Mathematics (if supported)
When \(a \ne 0\), there are two solutions to \(ax^2 + bx + c = 0\) and they are:
\[x = {-b \pm \sqrt{b^2-4ac} \over 2a}\]

### Mermaid Diagrams (if supported)
```mermaid
graph TD;
    A-->B;
    A-->C;
    B-->D;
    C-->D;
```

### Highlighting
==This text is highlighted== (if supported)

### Subscript and Superscript
H~2~O (subscript if supported)
X^2^ (superscript if supported)

### Abbreviations
*[HTML]: Hyper Text Markup Language
The HTML specification is maintained by the W3C.

### Custom Containers (if supported)
::: warning
This is a warning
:::

::: info
This is an info box
:::

### Comments
[//]: # (This is a comment that won't be rendered)

<!-- This is another way to write comments -->

---

*End of Markdown Test File*

This test file includes:
1. All basic Markdown syntax
2. Extended Markdown features (some may require specific parser support)
3. Various formatting combinations
4. Different types of content blocks
5. Examples of each element's usage

Note that some features (like Mermaid diagrams, math equations, or custom containers) might require additional support or extensions in your Markdown parser. The FilamentPHP Markdown editor supports most common Markdown syntax, but you may want to test which extended features are supported in your specific implementation.

You can copy this into your FilamentPHP Markdown editor to test the rendering and functionality of different Markdown elements.

