@javascript @mbseasyforms
Feature: Shortened create course menu
  As User it is nicer not to be blown away by options

  Scenario: Check course create Menu collapsed hidden
    Given I log in as "admin"
    When I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Mehr Optionen"
    And I should not see "Kursformat"

  Scenario: Check course create Menu collapse
    Given I log in as "admin"
    When I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Mehr Optionen"
    And I click on "Mehr Optionen"
    Then I should see "Kursformat"
    And I should see "Darstellung"
    And I should see "Dateien un Uploads"
    And I should see "Darstellung"
    When I click on "Mehr Optionen"
    And I should not see "Kursformat"

  Scenario: Check course create Menu collapse all
    Given I log in as "admin"
    When I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Mehr Optionen"
    And I click on "Alle Aufklappen"
    Then I should see "Kursformat"
    And I should see "Anzahl der Abschnitte"
    And I should see "Dateien und Uploads"
    And I should see "Darstellung"
    When I click on "Alle einklappen"
    And I should not see "Kursformat"

 Scenario: Check mbseasyfomrs hide option
    Given I log in as "admin"
    And I navigate to "Plugins > Lokale Plugins > mebis Easy Forms"
    Then I should see "Einzelne Felder ausblenden"
    Then I add to the field "s_local_mbseasyforms_easyformsconfig" to "id_idnumber#ID Kurs"
    Then I click on "Änderungen sichern"
    Then I should see "Änderungen gespeichert"
    And I should see "id_idnumber#ID Kurs"
    When I click on "Schreibtisch"
    And I click on "Kurs erstellen" "link"
    Then I should see "Neuen Kurs anlegen"
    And I should see "Mehr Optionen"
    And I should not see "ID Kurs"

