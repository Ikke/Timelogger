Feature: Log time
  In order to keep my time
  As a developer
  I need to be able to add log entries

  Scenario: Add a single time entry
    Given I am a developer
    And The date is 2012-10-29
    When I enter the following into my time log:
    """
    08:00 - 09:00 - Doing something
    """
    Then A log entry should be created with:
    | time_ start | 08:00           |
    | time_end    | 09:00           |
    | description | Doing something |
    | date        | 2012-10-29      |

