
        $(function() {
          var switcher = new SwitchButton({
            link: ".lessons-list li",
            block: ".lesson"
          });
          switcher.init();
          var tabSwitcher = new SwitchButton({
            link: "#switch_table li",
            block: ".sch_table"
          });
          tabSwitcher.init();
        })
        