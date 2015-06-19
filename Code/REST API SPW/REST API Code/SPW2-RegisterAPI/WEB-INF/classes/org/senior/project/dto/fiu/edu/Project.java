package org.senior.project.dto.fiu.edu;

public class Project
{
    
  private String project_id;
  private String mentor_id;
  private String mentor_firstname;
  private String mentor_lastname;
  private String title;
  private String description;
  private String proposed_by_id;
  

    public Project(String project_id, String mentor_id, String mentor_firstname, String mentor_lastname, String title, String description, String proposed_by) {
        this.project_id = project_id;
        this.mentor_id = mentor_id;
        this.mentor_firstname = mentor_firstname;
        this.mentor_lastname = mentor_lastname;
        this.title = title;
        this.description = description;
        this.proposed_by_id = proposed_by;
    }

    public String getProject_id() {
        return project_id;
    }

    public void setProject_id(String project_id) {
        this.project_id = project_id;
    }

    public String getMentor_id() {
        return mentor_id;
    }

    public void setMentor_id(String mentor_id) {
        this.mentor_id = mentor_id;
    }

    public String getMentor_firstname() {
        return mentor_firstname;
    }

    public void setMentor_firstname(String mentor_firstname) {
        this.mentor_firstname = mentor_firstname;
    }

    public String getMentor_lastname() {
        return mentor_lastname;
    }

    public void setMentor_lastname(String mentor_lastname) {
        this.mentor_lastname = mentor_lastname;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getProposed_by_id() {
        return proposed_by_id;
    }

    public void setProposed_by(String proposed_by) {
        this.proposed_by_id = proposed_by;
    }

  

 
}