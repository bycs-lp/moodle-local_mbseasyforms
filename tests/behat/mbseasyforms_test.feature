@javascript @mbseasyforms

#Note that this test is currently NOT running.
#After making the "Kurs erstellen" feature available again, we must check again
#whether this test works:
#See: http://pm.mebis.alp.dillingen.de/?controller=TaskViewController&action=show&task_id=3196&project_id=2

Feature: Shortened create course menu
  As User it is nicer not to be blown away by options

  Scenario: Check course create Menu collapsed hidden
    Given I log in as "admin"
    And I click on "Dashboard" "link"
    When I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Alle Einstellungen"
    And I should see "Vollständiger Kursname"
    And I should not see "Allgemeines"

  Scenario: Check course create Menu collapse
    Given I log in as "admin"
    When I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Alle Einstellungen"
    And I click on "Alle Einstellungen" "link"
    Then I should see "Allgemeines"
    And I should see "Kurs-ID"
    And I should see "Darstellung"
    And I should see "Dateien un Uploads"
    And I should see "Darstellung"
    When I click on "Weniger Einstellungen" "link"
    And I should not see "Allgemeines"

  Scenario: Check course create Menu collapse all
    Given I log in as "admin"
    When I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Alle Einstellungen"
    And I click on "Alle Aufklappen" "link"
    Then I should see "Kurs-ID"
    And I should see "Anzahl der Abschnitte"
    And I should see "Dateien und Uploads"
    And I should see "Darstellung"
    When I click on "Alle einklappen" "link"
    And I should not see "Kurs-ID"

 Scenario: Check mbseasyfomrs hide option
    Given I log in as "admin"
    And I expand "Site administration" node
    And I expand "Plugins" node
    And I expand "Local plugins" node
    And I click on "#local_mbseasyforms_tree_item" "css_element"
    Then I should see "Konfiguration"
    Then I set the field "id_s_local_mbseasyforms_easyformsconfig" to "{'page-course-edit':{'default_disabled': false,'elements': ['fitem_id_idnumber']  }}"
    Then I click on "Änderungen sichern" "link"
    Then I should see "Änderungen gespeichert"
    And I should see "{'page-course-edit':{'default_disabled': false,'elements': ['fitem_id_idnumber']  }}"
    When I click on "Schreibtisch" "link"
    And I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Alle Einstellungen"
    And I should see "Kurs-ID"

